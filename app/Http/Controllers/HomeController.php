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
        $this->middleware('auth')->except(['landing']);
    }

    /**
     * Show the landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        $services = DB::table('m_services')->get();
        $cities = $services->pluck('city')->unique()->values();                
        $additionals = DB::table('m_additionals')->get();

        // Load portfolio images from storage and group by university
        $portfolioGrouped = [];
        if (\Storage::disk('public')->exists('portfolio')) {
            $files = \Storage::disk('public')->files('portfolio');
            
            foreach ($files as $file) {
                $filename = basename($file);
                $url = \Storage::url($file);
                
                // Parse university prefix from filename (format: CODE_timestamp_filename.ext)
                $parts = explode('_', $filename, 2);
                $universityCode = count($parts) > 1 ? $parts[0] : 'Unknown';
                
                if (!isset($portfolioGrouped[$universityCode])) {
                    $portfolioGrouped[$universityCode] = [];
                }
                
                $portfolioGrouped[$universityCode][] = $url;
            }
            
            // Sort each group and limit to reasonable number
            foreach ($portfolioGrouped as $code => $images) {
                // Shuffle for variety but keep consistent per session
                // $portfolioGrouped[$code] = array_slice($images, 0, 20); // Max 20 per university
                $portfolioGrouped[$code] = $images;
            }
        }

        // Load hero image from storage
        $heroImage = asset('images/landing_page/bw-1.jpg'); // default fallback
        if (\Storage::disk('public')->exists('landing/hero.jpg')) {
            $heroImage = \Storage::url('landing/hero.jpg');
        } elseif (\Storage::disk('public')->exists('landing/hero.png')) {
            $heroImage = \Storage::url('landing/hero.png');
        } elseif (\Storage::disk('public')->exists('landing/hero.jpeg')) {
            $heroImage = \Storage::url('landing/hero.jpeg');
        } elseif (\Storage::disk('public')->exists('landing/hero.gif')) {
            $heroImage = \Storage::url('landing/hero.gif');
        }

        $heroImage = asset($heroImage);

        return view('landing',[
            'cities' => $cities,
            'services' => $services,
            'additionals' => $additionals,
            'portfolioGrouped' => $portfolioGrouped, // Changed from portfolioImages
            'heroImage' => $heroImage
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $isAdmin = $user->role_code === 'admin';
        $currentYear = date('Y');
        $currentMonth = date('m');

        // Base query for projects
        $baseQuery = DB::table('t_projects')
            ->where('cancelled_at', null);

        if (!$isAdmin) {
            $baseQuery->where('user_id', $user->id);
        }

        // Total projects this year
        $totalProjectsThisYear = (clone $baseQuery)
            ->whereYear('event_date', $currentYear)
            ->count();

        // Upcoming events (next 30 days)
        $upcomingEvents = (clone $baseQuery)
            ->where('event_date', '>=', date('Y-m-d'))
            ->where('event_date', '<=', date('Y-m-d', strtotime('+30 days')))
            ->count();

        // Projects by status
        $pendingPayment = (clone $baseQuery)
            ->whereYear('event_date', $currentYear)
            ->whereNotNull('downpayment_at')
            ->whereNull('paid_at')
            ->count();

        $pendingFiles = (clone $baseQuery)
            ->whereYear('event_date', $currentYear)
            ->whereNotNull('paid_at')
            ->whereNull('all_filled_at')
            ->count();

        $completedProjects = (clone $baseQuery)
            ->whereYear('event_date', $currentYear)
            ->whereNotNull('all_done_at')
            ->count();

        // Monthly bookings for chart (current year)
        $monthlyBookings = DB::table('t_projects')
            ->select(DB::raw('MONTH(event_date) as month'), DB::raw('COUNT(*) as total'))
            ->where('cancelled_at', null)
            ->whereYear('event_date', $currentYear)
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            })
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        // Fill missing months with 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $monthlyBookings[$i] ?? 0;
        }

        // Calculate revenue this year
        $revenueThisYear = DB::table('t_projects')
            ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
            ->where('t_projects.cancelled_at', null)
            ->whereYear('t_projects.event_date', $currentYear)
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('t_projects.user_id', $user->id);
            })
            ->sum('m_services.price');

        // Add additionals to revenue
        $additionalsRevenue = DB::table('t_project_additionals')
            ->join('t_projects', 't_project_additionals.project_id', '=', 't_projects.id')
            ->where('t_projects.cancelled_at', null)
            ->whereYear('t_projects.event_date', $currentYear)
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('t_projects.user_id', $user->id);
            })
            ->sum('t_project_additionals.price');

        $totalRevenue = $revenueThisYear + $additionalsRevenue;

        // Revenue this month
        $revenueThisMonth = DB::table('t_projects')
            ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
            ->where('t_projects.cancelled_at', null)
            ->whereYear('t_projects.event_date', $currentYear)
            ->whereMonth('t_projects.event_date', $currentMonth)
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('t_projects.user_id', $user->id);
            })
            ->sum('m_services.price');

        $additionalsRevenueMonth = DB::table('t_project_additionals')
            ->join('t_projects', 't_project_additionals.project_id', '=', 't_projects.id')
            ->where('t_projects.cancelled_at', null)
            ->whereYear('t_projects.event_date', $currentYear)
            ->whereMonth('t_projects.event_date', $currentMonth)
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('t_projects.user_id', $user->id);
            })
            ->sum('t_project_additionals.price');

        $totalRevenueMonth = $revenueThisMonth + $additionalsRevenueMonth;

        // Recent projects
        $recentProjects = DB::table('t_projects')
            ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
            ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
            ->leftJoin('users', 't_projects.user_id', '=', 'users.id')
            ->where('t_projects.cancelled_at', null)
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('t_projects.user_id', $user->id);
            })
            ->select(
                't_projects.*',
                't_clients.name as client_name',
                't_clients.phone as client_phone',
                'm_services.package as service_package',
                'm_services.price as service_price',
                'users.name as photographer_name'
            )
            ->orderBy('t_projects.created_at', 'desc')
            ->limit(10)
            ->get();

        // Upcoming events list
        $upcomingEventsList = DB::table('t_projects')
            ->join('t_clients', 't_projects.client_id', '=', 't_clients.id')
            ->join('m_services', 't_projects.service_id', '=', 'm_services.id')
            ->leftJoin('users', 't_projects.user_id', '=', 'users.id')
            ->where('t_projects.cancelled_at', null)
            ->where('t_projects.event_date', '>=', date('Y-m-d'))
            ->when(!$isAdmin, function ($query) use ($user) {
                return $query->where('t_projects.user_id', $user->id);
            })
            ->select(
                't_projects.*',
                't_clients.name as client_name',
                't_clients.shortname as client_shortname',
                't_clients.phone as client_phone',
                'm_services.package as service_package',
                'm_services.city as service_city',
                'users.name as photographer_name'
            )
            ->orderBy('t_projects.event_date', 'asc')
            ->limit(8)
            ->get();

        // Status distribution
        $statusDistribution = [
            'follow_up' => (clone $baseQuery)->whereYear('event_date', $currentYear)->whereNull('downpayment_at')->count(),
            'dp_paid' => (clone $baseQuery)->whereYear('event_date', $currentYear)->whereNotNull('downpayment_at')->whereNull('paid_at')->count(),
            'paid' => (clone $baseQuery)->whereYear('event_date', $currentYear)->whereNotNull('paid_at')->whereNull('all_filled_at')->count(),
            'files_ready' => (clone $baseQuery)->whereYear('event_date', $currentYear)->whereNotNull('all_filled_at')->whereNull('all_done_at')->count(),
            'completed' => $completedProjects
        ];

        // Active photographers count (admin only)
        $activePhotographers = 0;
        if ($isAdmin) {
            $activePhotographers = DB::table('users')
                ->where('role_code', 'photographer')
                ->count();
        }

        return view('home', compact(
            'totalProjectsThisYear',
            'upcomingEvents',
            'pendingPayment',
            'pendingFiles',
            'completedProjects',
            'monthlyData',
            'totalRevenue',
            'totalRevenueMonth',
            'recentProjects',
            'upcomingEventsList',
            'statusDistribution',
            'activePhotographers',
            'isAdmin'
        ));
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
