<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->status_flow = [
            'waiting_confirmation' => [ 'booking', 'cancelled' ],
            'booking' => ['confirmed', 'cancelled'],
            'confirmed' => ['completed', 'cancelled'], //by downpayment
            // auto when d-day on session_date
        'invoiced' => ['paid', 'cancelled'], // after invoice sent
            'shooting' => [],
            'editing' => [],
            'review' => [],
            'completed' => [],
            'delivered' => [],
        ];


    }


    public function indexCreateProject()
    {
        $title = 'New Client';

        $services = DB::table('m_services')->get();
        $cities = $services->pluck('city')->unique()->values();
        $universities = DB::table('m_universities')->get();        
        $faculties = DB::table('m_faculties')->get();
        $additionals = DB::table('m_additionals')->get();

        $projects = DB::table('t_projects')
        ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
        ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
        ->select('t_projects.*', 't_clients.name as client_name', 'm_services.package as service_package')
        ->get();

        return view('projects.index_projects', [
            'title' => $title,
            'services' => $services,
            'cities' => $cities,
            'universities' => $universities,
            'faculties' => $faculties,
            'additionals' => $additionals,
            'projects' => $projects
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        try {
            DB::beginTransaction();

            // Insert into Client table
            $clientId = DB::table('t_clients')->insertGetId([
                'name' => $data['client_name'],
                'phone' => $data['phone'],
                'email' => $data['email'] ?? null,
                'instagram' => $data['instagram'] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Insert into Projects table
            $projectId = DB::table('t_projects')->insertGetId([
                'progress' => 'booking',
                'event_date' => $data['event_date'],
                'event_time' => $data['event_time'] ?? null,
                'client_id' => $clientId,
                'service_id' => $data['service_package'],
                'city' => $data['city'],
                'university' => $data['university'],
                'faculty' => $data['faculty'],
                'notes' => $data['notes'] ?? null,
                'downpayment_at' => isset($data['deposit_paid']) ? now() : null,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // insert into Project Additionals table
            // "data[additional]" => "2,3,47"
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
                'message' => 'Project created successfully'
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


    public function indexClients()
    {
        $title = 'Clients';

        return view('clients.index_clients', [
            'title' => $title
        ]);
    }


    public function getProjectClients(Request $request)
    {
        try {
            $start_date = $request->get('start_date', date('Y-m-01'));            
            $end_date = $request->get('end_date', date('Y-m-t'));

            $projects_clients = DB::table('t_projects')
                ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
                ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
                ->where('t_projects.cancelled_at', null)
                ->whereBetween('t_projects.event_date', [$start_date, $end_date])
                ->select('t_projects.*', 
                        't_clients.name as client_name',
                        't_clients.shortname as client_shortname',
                        't_clients.phone as client_phone',
                        't_clients.email as client_email',
                        't_clients.instagram as client_instagram',
                        'm_services.package as service_package',
                        'm_services.duration as service_duration',
                        'm_services.price as service_price',
                        )
                ->get();


            $additionals = DB::table('t_project_additionals')                
                ->whereIn('project_id', $projects_clients->pluck('id'))
                ->select('project_id', 'description', 'price')
                ->get();
                
            $response = [
                'status' => 'success',
                'message' => 'Projects and Clients fetched successfully',
                'projects_clients' => $projects_clients,
                'additionals' => $additionals
            ];

            return response()->json($response, 200);
            
        } catch (\Throwable $th) {
            $response = [
                'status' => 'error',
                'message' => $th->getMessage()
            ];

            return Response::json($response, 500);
        }
    }


    public function edit($id)
    {
        try {
            $project = DB::table('t_projects')
                ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
                ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
                ->where('t_projects.id', $id)
                ->select('t_projects.*', 
                        't_clients.name as client_name',
                        't_clients.phone as client_phone',
                        't_clients.email as client_email',
                        't_clients.instagram as client_instagram',
                        'm_services.id as service_id')
                ->first();

            if (!$project) {
                return redirect()->route('clients.index')->with('error', 'Project not found');
            }

            $services = DB::table('m_services')->get();
            $cities = $services->pluck('city')->unique()->values();
            $universities = DB::table('m_universities')->get();        
            $faculties = DB::table('m_faculties')->get();
            $additionals = DB::table('m_additionals')->get();

            $projectAdditionals = DB::table('t_project_additionals')
                ->where('project_id', $id)
                ->pluck('additional_id')
                ->toArray();

            return view('projects.edit_project', [
                'title' => 'Edit Client',
                'project' => $project,
                'services' => $services,
                'cities' => $cities,
                'universities' => $universities,
                'faculties' => $faculties,
                'additionals' => $additionals,
                'projectAdditionals' => $projectAdditionals
            ]);
            
        } catch (\Throwable $th) {
            return redirect()->route('clients.index')->with('error', $th->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            // Get project to find client_id
            $project = DB::table('t_projects')->where('id', $id)->first();
            
            if (!$project) {
                throw new \Exception('Project not found');
            }

            // Update Client table
            DB::table('t_clients')
                ->where('id', $project->client_id)
                ->update([
                    'name' => $data['client_name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'] ?? null,
                    'instagram' => $data['instagram'] ?? null,
                    'updated_at' => now()
                ]);

            // Update Projects table
            DB::table('t_projects')
                ->where('id', $id)
                ->update([
                    'progress' => $data['progress'] ?? $project->progress,
                    'event_date' => $data['event_date'],
                    'event_time' => $data['event_time'] ?? null,
                    'service_id' => $data['service_package'],
                    'city' => $data['city'],
                    'university' => $data['university'],
                    'faculty' => $data['faculty'],
                    'notes' => $data['notes'] ?? null,
                    'downpayment_at' => isset($data['deposit_paid']) ? ($project->downpayment_at ?? now()) : null,
                    'updated_at' => now()
                ]);

            // Update Project Additionals
            DB::table('t_project_additionals')->where('project_id', $id)->delete();

            if (isset($data['additional']) && !empty($data['additional'])) {            
                $additionalIds = is_array($data['additional']) 
                    ? $data['additional'] 
                    : explode(',', $data['additional']);                            
                
                $additionals = DB::table('m_additionals')
                    ->whereIn('id', $additionalIds)
                    ->get(['id', 'package', 'price']);
                
                $projectAdditionals = [];
                foreach ($additionals as $additional) {
                    $projectAdditionals[] = [
                        'project_id' => $id,
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
                'message' => 'Project updated successfully'
            ];

            return response()->json($response, 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'message' => $th->getMessage()
            ];

            return Response::json($response, 500);
        }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Get project to find client_id
            $project = DB::table('t_projects')->where('id', $id)->first();
            
            if (!$project) {
                throw new \Exception('Project not found');
            }

            // Delete project additionals
            DB::table('t_project_additionals')->where('project_id', $id)->delete();

            // Soft delete project (set cancelled_at)
            DB::table('t_projects')
                ->where('id', $id)
                ->update([
                    'cancelled_at' => now(),
                    'updated_at' => now()
                ]);

            DB::commit();

            $response = [
                'status' => 'success',
                'message' => 'Project deleted successfully'
            ];

            return response()->json($response, 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'message' => $th->getMessage()
            ];

            return Response::json($response, 500);
        }
    }
}
