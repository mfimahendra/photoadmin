<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexOverview()
    {
        $title = 'Overview';

        return view('overview.index_overview', [
            'title' => $title
        ]);
    }

    public function getPhotographerEvents(Request $request)
    {
        try {
            $year = $request->get('year', date('Y'));

            // check user is photographer or admin, if admin without filtering user_id
            $user = auth()->user();            
            $isAdmin = $user->role_code === 'admin'; // Adjust 'role' to your actual admin role attribute if different

            $photographerId = $isAdmin ? null : $user->id;

            $events = DB::table('t_projects')
                ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
                ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
                ->leftJoin('t_project_files', function($join) {
                    $join->on('t_projects.id', '=', 't_project_files.project_id')
                         ->whereNull('t_project_files.remark');
                })
                ->leftJoin('users', 't_projects.user_id', '=', 'users.id')
                ->where('t_projects.cancelled_at', null)
                ->when(!$isAdmin, function ($query) use ($photographerId) {
                    return $query->where('t_projects.user_id', $photographerId);
                })
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
                        't_projects.event as event_type',
                        't_project_files.link as drive_link',
                        'users.name as photographer_name',
                        'users.username as photographer_username'
                        )
                ->orderBy('t_projects.event_date', 'asc')
                ->get();

            // Get additionals for all events
            $projectIds = $events->pluck('id');
            $additionals = DB::table('t_project_additionals')
                ->whereIn('project_id', $projectIds)
                ->select('project_id', 'additional_id', 'description', 'price')
                ->get()
                ->groupBy('project_id');

            // Attach additionals to each event
            foreach ($events as $event) {
                $event->additionals = $additionals->get($event->id, collect())->toArray();
            }

            $response = [
                'status' => 'success',
                'message' => 'Events fetched successfully',
                'events' => $events
            ];

            return response()->json($response, 200);
            
        } catch (\Throwable $th) {
            $response = [
                'status' => 'error',
                'message' => $th->getMessage()
            ];

            return response()->json($response, 500);
        }
    }
}
