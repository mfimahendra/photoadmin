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
