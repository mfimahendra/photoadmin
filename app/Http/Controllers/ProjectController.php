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
            'booking' => ['confirmed', 'cancelled'],
            'confirmed' => ['completed', 'cancelled'], //by downpayment
            // auto when d-day on session_date
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

        return view('projects.index_projects', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();                

        try {
            DB::beginTransaction();

            foreach ($data['data'] as $row) {
                $data = [
                    'session_date' => $row[0],
                    'session_time' => $row[1],
                    'name' => $row[2],
                    'phone' => $row[3],
                    'email' => $row[4],
                    'address' => $row[5],
                    'region' => $row[6],
                    'type' => $row[7],
                    'notes' => $row[8],
                    'status' => 'booking',
                    // add other necessary fields here
                ];

                // Process each row
                $client = DB::table('clients')->where('email', $data['email'])->orWhere('phone', $data['phone'])->first();

                if ($client) {
                    $clients = $client->id;
                } else {
                    $clients = DB::table('clients')->insertGetId([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'phone' => $data['phone'],
                        'address' => $data['address'],
                        'region' => $data['region'],
                        'notes' => $data['notes'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }

                // get_service_id
                $service = DB::table('services')->where('name', $data['type'])->first();
                if ($service) {
                    $service_id = $service->id;
                } else {                    
                    $service_id = DB::table('services')->insertGetId([
                        'name' => $data['type'],
                        'price' => 0,
                        'description' => '',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }

                // Generate Project Code
                $ymd = date('Ymd');

                $project_type_code = preg_replace('/[aeiouAEIOU\s]/', '', strtoupper($data['type']));
                if (strlen($project_type_code) > 3) {
                    $project_type_code = substr($project_type_code, 0, 3);
                }
                
                // clear vocal on region
                $region_code = preg_replace('/[aeiouAEIOU\s]/', '', strtoupper($data['region']));
                if (strlen($region_code) > 3) {
                    $region_code = substr($region_code, 0, 3);
                }

                $project_code = $project_type_code . '-' . $ymd . '-' . $region_code;                

                $project_id = DB::table('projects')->insertGetId([
                    'client_id' => $clients,
                    'service_id' => $service_id,
                    // 'photographer_id' => $data['photographer_id'],
                    'project_code' => $project_code,
                    'title' => $data['title'] ?? $data['type'] . ' Session',
                    'session_date' => $data['session_date'],
                    'session_time' => $data['session_time'],
                    'location' => $data['address'],
                    'region' => $data['region'],
                    'status' => $data['status'],
                    'notes' => $data['notes'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
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
}
