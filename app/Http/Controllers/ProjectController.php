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
            'Follow Up',
            'Client DP',
            'Invoice',
            'Lunas',
            'All Files',
            'Req Edit',
            'All Done',
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
        $events = DB::table('m_events')->get();

        $freelances = DB::table('m_freelances')->get();
        $photographers = DB::table('users')            
            ->select('id','username','name','phone','email')
            ->where('role_code', 'photographer')
            ->get();

        // join by phone number if exists or by email if exists in users columns else keep null
        foreach ($photographers as $photographer) {
            $freelance = null;
            
            if (!empty($photographer->phone)) {
                $freelance = $freelances->firstWhere('phone', $photographer->phone);
            }
            
            if (!$freelance && !empty($photographer->email)) {
                $freelance = $freelances->firstWhere('email', $photographer->email);
            }
            
            if ($freelance) {
                $photographer->freelance_id = $freelance->id;
                $photographer->domicile = $freelance->domicile;
            } else {
                $photographer->freelance_id = null;
                $photographer->domicile = null;
            }
        }    
        
        // sort by domicile
        $photographers = $photographers->sortBy('domicile')->values();

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
            'events' => $events,
            'photographers' => $photographers,
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
                'shortname' => $data['nickname'] ?? null,
                'phone' => $data['phone'],                
                'instagram' => $data['instagram'] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Insert into Projects table
            $projectId = DB::table('t_projects')->insertGetId([                
                'event_date' => $data['event_date'],
                'event_time' => $data['event_time'] ?? null,
                'event' => $data['event_type'] ?? null,
                'client_id' => $clientId,
                'service_id' => $data['service_package'],
                'city' => $data['city'],
                'university' => $data['university'],
                'faculty' => $data['faculty'] ?? null,
                'location' => $data['location'] ?? null,
                'notes' => $data['notes'] ?? null,
                'user_id' => $data['photographer'] ?? null,
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
        $title = 'Clients Overview';

        $freelances = DB::table('m_freelances')->get();
        $photographers = DB::table('users')            
            ->select('id','username','name','phone','email')
            ->where('role_code', 'photographer')
            ->get();

        // join by phone number if exists or by email if exists in users columns else keep null
        foreach ($photographers as $photographer) {
            $freelance = null;
            
            if (!empty($photographer->phone)) {
            $freelance = $freelances->firstWhere('phone', $photographer->phone);
            }
            
            if (!$freelance && !empty($photographer->email)) {
            $freelance = $freelances->firstWhere('email', $photographer->email);
            }
            
            if ($freelance) {
            $photographer->freelance_id = $freelance->id;
            $photographer->domicile = $freelance->domicile;
            } else {
            $photographer->freelance_id = null;
            $photographer->domicile = null;
            }
        }    
        
        // sort by domicile
        $photographers = $photographers->sortBy('domicile')->values();
        
        // Get data for form selects
        $services = DB::table('m_services')->get();
        $cities = $services->pluck('city')->unique()->values();
        $universities = DB::table('m_universities')->get();
        $faculties = DB::table('m_faculties')->get();
        $additionals = DB::table('m_additionals')->get();
        $events = DB::table('m_events')->get();

        return view('clients.index_clients', [
            'title' => $title,
            'photographers' => $photographers,
            'services' => $services,
            'cities' => $cities,
            'universities' => $universities,
            'faculties' => $faculties,
            'additionals' => $additionals,
            'events' => $events
        ]);
    }


    public function getProjectClients(Request $request)
    {
        try {
            $year = $request->get('year', date('Y'));

            $projects_clients = DB::table('t_projects')
                ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
                ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
                ->where('t_projects.cancelled_at', null)
                ->whereYear('t_projects.event_date', $year)
                ->select('t_projects.*', 
                        't_clients.name as client_name',
                        't_clients.shortname as client_shortname',
                        't_clients.phone as client_phone',                        
                        't_clients.instagram as client_instagram',
                        'm_services.package as service_package',
                        'm_services.duration as service_duration',
                        'm_services.price as service_price',
                        't_projects.user_id as photographer_id',
                        't_projects.event as event_type'
                        );

            // check login if photographer, show only their projects
            if (auth()->check() && auth()->user()->role_code === 'photographer') {
                $projects_clients = $projects_clients->where('t_projects.user_id', auth()->user()->id);
            }
            $projects_clients = $projects_clients->get();

            $additionals = DB::table('t_project_additionals')                
                ->whereIn('project_id', $projects_clients->pluck('id'))
                ->select('project_id', 'additional_id', 'description', 'price')
                ->get();

            $files = DB::table('t_project_files')                
                ->whereIn('project_id', $projects_clients->pluck('id'))
                ->select('project_id', 'link', 'remark')
                ->get();
                
            $response = [
                'status' => 'success',
                'message' => 'Projects and Clients fetched successfully',
                'projects_clients' => $projects_clients,
                'additionals' => $additionals,
                'files' => $files
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
                    'shortname' => $data['nickname'] ?? null,
                    'phone' => $data['phone'],
                    'instagram' => $data['instagram'] ?? null,
                    'updated_at' => now()
                ]);

            // Update Projects table
            DB::table('t_projects')
                ->where('id', $id)
                ->update([                    
                    'event_date' => $data['event_date'],
                    'event_time' => $data['event_time'] ?? null,
                    'event' => $data['event_type'] ?? null,
                    'service_id' => $data['service_package'],
                    'city' => $data['city'],
                    'university' => $data['university'],
                    'faculty' => $data['faculty'],
                    'location' => $data['location'] ?? null,
                    'notes' => $data['notes'] ?? null,                    
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

    public function updateProgress(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'project_id' => 'required|integer',
                'field' => 'required|in:downpayment_at,invoiced_at,paid_at,all_filled_at,all_done_at',
                'value' => 'required|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid input data',
                    'errors' => $validator->errors()
                ], 422);
            }

            $projectId = $request->project_id;
            $field = $request->field;
            $value = $request->value;

            DB::beginTransaction();

            // Get the project
            $project = DB::table('t_projects')->where('id', $projectId)->first();
            
            if (!$project) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Project not found'
                ], 404);
            }

            // Update the field
            $updateData = [
                $field => $value ? now() : null,
                'updated_at' => now()
            ];

            DB::table('t_projects')
                ->where('id', $projectId)
                ->update($updateData);

            DB::commit();

            // Get updated project data
            $updatedProject = DB::table('t_projects')->where('id', $projectId)->first();

            return response()->json([
                'status' => 'success',
                'message' => 'Progress updated successfully',
                'data' => $updatedProject
            ], 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updatePhotographer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'project_id' => 'required|integer',
                'photographer_id' => 'nullable|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid input data',
                    'errors' => $validator->errors()
                ], 422);
            }

            $projectId = $request->project_id;
            $photographerId = $request->photographer_id;

            DB::beginTransaction();

            // Get the project
            $project = DB::table('t_projects')->where('id', $projectId)->first();
            
            if (!$project) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Project not found'
                ], 404);
            }

            // Update the photographer
            DB::table('t_projects')
                ->where('id', $projectId)
                ->update([
                    'user_id' => $photographerId,
                    'updated_at' => now()
                ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Photographer updated successfully'
            ], 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function updateDriveLink(Request $request)
    {
        try {                        

            $projectId = $request->get('project_id');
            $driveLink = $request->get('drive_link');                                    
            $remark = $request->get('remark', null);

            // Update the Google Drive link
            // Insert or update the Google Drive link for the project
            $existing = DB::table('t_project_files')
                ->where('project_id', $projectId)
                ->where('remark', $remark)
                ->first();

            if ($existing) {
                DB::table('t_project_files')
                    ->where('project_id', $projectId)
                    ->where('remark', $remark)
                    ->update([
                        'link' => $driveLink,
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('t_project_files')->insert([
                    'project_id' => $projectId,
                    'link' => $driveLink,
                    'remark' => $remark,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            

            return response()->json([
                'status' => 'success',
                'message' => 'Google Drive link updated successfully',
                'drive_link' => $driveLink,
                'remark' => $remark
            ], 200);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
