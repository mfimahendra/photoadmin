<aside class="main-sidebar sidebar-light-primary elevation-4">

    <a href="{{ route('home') }}" class="brand-link">
        {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}        
        {{-- <img src="{{ asset('images/esokhari-logo.png')}}" alt="esokhari-logo" class="brand-image" style="width:30px; height:30px; margin-left:10px;"> --}}
        <span style="font-size: 30px; margin-left:10px;">📸</span>
        <span class="brand-text" style="font-size: 16px; font-weight:600;">ESOK · HARI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="{{ route('home') }}/" class="nav-link">                        
                        📸
                        <p>Overview</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">                        
                        📆
                        <p>Schedule</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        📊
                        <p>Statistic</p>
                    </a>
                </li>
                <hr style="border: 1px solid #3333355; width: 90%;">
                <li class="nav-item" style="background: linear-gradient(100deg, #28c063 0%, #34f87f 100%); border-radius: 8px; margin-bottom: 8px;">
                    <a href="{{ route('projects.index') }}" class="nav-link">
                        ➕
                        <p>New Clients</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                        👥
                        <p>Clients</p>
                    </a>
                </li>
                <hr style="border: 1px solid #3333355; width: 90%;">
                <li class="nav-header">Master</li>

                <li class="nav-item">
                    <a href="{{ route('master.index', ['masters' => 'services']) }}" class="nav-link">
                        📸
                        <p>Services</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('master.index', ['masters' => 'additionals']) }}" class="nav-link">
                        📦
                        <p>Additionals</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('master.index', ['masters' => 'freelances']) }}" class="nav-link">
                        🤙
                        <p>Freelances</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('master.index', ['masters' => 'universities']) }}" class="nav-link">
                        🎓
                        <p>Universities</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('master.index', ['masters' => 'faculties']) }}" class="nav-link">
                        🏫
                        <p>Faculties</p>
                    </a>
                </li>                

                <hr style="border: 1px solid #3333355; width: 90%;">

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        👤
                        <p>Users</p>
                    </a>
                </li>                
            </ul>
        </nav>
    </div>
</aside>
