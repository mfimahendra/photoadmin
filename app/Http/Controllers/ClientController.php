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

        $admin_phone = DB::table('users')->where('username', 'admin')->value('phone');

        return view('clients.form_clients', [
            'title' => $title,
            'services' => $services,
            'cities' => $cities,
            'universities' => $universities,
            'faculties' => $faculties,
            'additionals' => $additionals,
            'admin_phone' => $admin_phone
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            // Insert into Client table
            // Check if client already exists by phone, email, or instagram
            $existingClient = DB::table('t_clients')
                ->where(function($query) use ($data) {
                    $query->where('phone', $data['phone']);
                    
                    if (!empty($data['email'])) {
                        $query->orWhere('email', $data['email']);
                    }
                    
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
                    'email' => $data['email'] ?? null,
                    'instagram' => $data['instagram'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            // Insert into Projects table
            $projectId = DB::table('t_projects')->insertGetId([
                'progress' => 'waiting_confirmation',
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
}
