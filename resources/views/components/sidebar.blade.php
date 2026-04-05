<aside class="main-sidebar sidebar-light-primary elevation-4">    
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('images/icon/esokhari-logo.png')}}" alt="esokhari-logo" class="brand-logo">
        <img src="{{ asset('images/icon/esokhari.png')}}" alt="esokhari-logo" class="brand-full">
    </a>    

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                
                {{-- <li class="nav-header">Dashboard</li> --}}
                <li class="nav-item">
                    <a href="{{ route('overview') }}" class="nav-link">                        
                        <i class="lni lni-calendar-days"></i>
                        <p>Schedule</p>
                    </a>
                </li>                
                

                @if(auth()->check() && auth()->user()->role_code === 'admin')
                <li class="nav-item">
                    <a href="{{ route('financial.index') }}" class="nav-link">                        
                        <i class="lni lni-bar-chart-dollar"></i>
                        <p>Finance</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('master.indexEditLandingPage') }}" class="nav-link">                        
                        <i class="lni lni-rocket-5"></i>
                        <p>Landing Page</p>
                    </a>
                </li>

                <hr style="border: 1px solid #3333355; width: 90%;">

                <li class="nav-item">
                    <a href="{{ route('projects.create') }}" class="nav-link">
                        <i class="lni lni-plus"></i>
                        <p>New Clients</p>
                    </a>
                </li>
                @endif
                
                <li class="nav-item">
                    <a href="{{ route('projects.index') }}" class="nav-link">
                        <i class="lni lni-user-multiple-4"></i>
                        <p>Clients</p>
                    </a>
                </li>

                @if(auth()->check() && auth()->user()->role_code === 'admin')
                    <hr style="border: 1px solid #3333355; width: 90%;">
                    {{-- <li class="nav-header">Master</li> --}}

                    <li class="nav-item">
                        <a href="{{ route('master.index', ['masters' => 'freelances']) }}" class="nav-link">
                            <i class="lni lni-camera-1"></i>
                            <p>Freelances</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('master.index', ['masters' => 'services']) }}" class="nav-link">                            
                            <i class="lni lni-gallery"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('master.index', ['masters' => 'additionals']) }}" class="nav-link">
                            <i class="lni lni-photos"></i>
                            <p>Additionals</p>
                        </a>
                    </li>                

                    <li class="nav-item">
                        <a href="{{ route('master.index', ['masters' => 'universities']) }}" class="nav-link">
                            <i class="lni lni-graduation-cap-1"></i>
                            <p>Universities</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('master.index', ['masters' => 'faculties']) }}" class="nav-link">
                            <i class="lni lni-graduation-cap-1"></i>
                            <p>Faculties</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('master.index', ['masters' => 'events']) }}" class="nav-link">
                            <i class="lni lni-balloons"></i>
                            <p>Events</p>
                        </a>
                    </li>

                    <hr style="border: 1px solid #3333355; width: 90%;">

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="lni lni-user-4"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
