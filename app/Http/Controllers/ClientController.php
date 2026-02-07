<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class ClientController extends Controller
{
    public function index()
    {
        $title = 'Clients';

        return view('clients.index_clients', [
            'title' => $title
        ]);
    }


    public function indexCreate()
    {
        $title = 'Tambah Client';

        return view('clients.add_clients', [
            'title' => $title
        ]);
    }


    public function indexForms()
    {
        $title = 'Wisuda Esok Hari';

        $services = DB::table('m_services')->get();
        $cities = $services->pluck('city')->unique()->values();
        $universities = DB::table('m_universities')->get();        
        $faculties = DB::table('m_faculties')->get();
        $additionals = DB::table('m_additionals')->get();
        $events = DB::table('m_events')->get();

        $admin_phone = DB::table('users')->where('username', 'admin')->value('phone');

        return view('clients.form_clients', [
            'title' => $title,
            'services' => $services,
            'cities' => $cities,
            'universities' => $universities,
            'faculties' => $faculties,
            'additionals' => $additionals,
            'events' => $events,
            'admin_phone' => $admin_phone
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        

        try {
            DB::beginTransaction();


            // Preparation: Clean phone number
            $data['phone'] = preg_replace('/\D/', '', $data['phone']);
            if (substr($data['phone'], 0, 1) === '0') {
                $data['phone'] = '62' . substr($data['phone'], 1);
            }

            // Insert into Client table
            // Check if client already exists by phone, email, or instagram
            $existingClient = DB::table('t_clients')
                ->where(function($query) use ($data) {
                    $query->where('phone', $data['phone']);                                
                    
                    if (!empty($data['instagram'])) {
                        $query->orWhere('instagram', $data['instagram']);
                    }
                })
                ->first();

            if ($existingClient) {
                $clientId = $existingClient->id;
            } else {
                $clientId = DB::table('t_clients')->insertGetId([
                    'name' => $data['client_name'],
                    'phone' => $data['phone'],
                    'shortname' => $data['nickname'] ?? null,
                    'instagram' => $data['instagram'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            // Insert into Projects table
            // Check if similar project already exists (within last 5 minutes to prevent spam)
            $recentProject = DB::table('t_projects')
                ->where('client_id', $clientId)
                ->where('event_date', $data['event_date'])
                ->where('service_id', $data['service_package'])
                ->where('created_at', '>=', now()->subMinutes(5))
                ->first();

            if ($recentProject) {
                throw new \Exception('Booking sudah pernah dibuat. Silakan konfirmasi data Anda ke Admin.');
            }

            $projectId = DB::table('t_projects')->insertGetId([
                'event_date' => $data['event_date'],
                'event_time' => $data['event_time'] ?? null,
                'client_id' => $clientId,
                'service_id' => $data['service_package'],
                'city' => $data['city'],
                'university' => $data['university'],
                'faculty' => $data['faculty'],
                'location' => $data['location'],
                'event' => $data['event_type'],
                'notes' => $data['notes'] ?? null,                
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // insert into Project Additionals table
            if (isset($data['additional']) && !empty($data['additional'])) {            
                
                // Convert string to array if needed
                $additionalIds = is_array($data['additional']) 
                    ? $data['additional'] 
                    : explode(',', $data['additional']);                            
                
                $additionals = DB::table('m_additionals')
                    ->whereIn('id', $additionalIds)
                    ->get(['id', 'package', 'price']);
                
                $projectAdditionals = [];
                foreach ($additionals as $additional) {
                    $projectAdditionals[] = [
                        'project_id' => $projectId,
                        'additional_id' => $additional->id,
                        'description' => $additional->package,
                        'price' => $additional->price,
                        'created_at' => now(),
                    ];
                }
                
                if (!empty($projectAdditionals)) {
                    DB::table('t_project_additionals')->insert($projectAdditionals);
                }
            }            
                                            

            DB::commit();

            $response = [
                'status' => 'success',
                'message' => 'Booking berhasil dibuat!'
            ];

            return response()->json($response, 201);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'message' => $th->getMessage()
            ];

            return Response::json($response, 500);

        }
    }

    public function indexClientProgress($date, $shortname)
    {
        $title = 'Wisuda Esok Hari';        

        $projects = DB::table('t_projects')
            ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
            ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
            ->leftJoin('t_project_files', function($join) {
                $join->on('t_projects.id', '=', 't_project_files.project_id')
                     ->whereNull('t_project_files.remark');
            })
            ->where('t_projects.event_date', $date)
            ->where('t_clients.shortname', $shortname)
            ->select('t_projects.*', 
                    't_clients.name as client_name',
                    't_clients.shortname as client_shortname',
                    't_clients.phone as client_phone',                        
                    't_clients.instagram as client_instagram',
                    'm_services.package as service_package',
                    'm_services.duration as service_duration',
                    'm_services.price as service_price',
                    't_project_files.link as drive_link'
                    )
            ->orderBy('t_projects.event_date', 'asc')
            ->get();

        if($projects->isEmpty()) {
            abort(404, 'Mohon maaf, data tidak ditemukan.');
        }

         // Get additionals and files for all projects

        $additionals = DB::table('t_project_additionals')
            ->whereIn('project_id', $projects->pluck('id'))
            ->select('project_id', 'additional_id', 'description', 'price')
            ->get()
            ->groupBy('project_id');

        $files = DB::table('t_project_files')
            ->whereIn('project_id', $projects->pluck('id'))            
            ->select('project_id', 'link', 'remark')
            ->get()
            ->groupBy('project_id');

        $projects->transform(function ($project) use ($additionals, $files) {
            $project->additionals = $additionals->get($project->id, collect())->toArray();
            $project->files = $files->get($project->id, collect())->toArray();
            return $project;
        });        

        return view('clients.client_progress', [
            'title' => $title,
            'date' => $date,
            'shortname' => $shortname,
            'projects' => $projects,
        ]);
    }
}
