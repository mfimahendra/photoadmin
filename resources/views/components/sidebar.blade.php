<aside class="main-sidebar sidebar-light-primary elevation-4">

    <a href="{{ route('home') }}" class="brand-link">
        {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}        
        <span style="font-size: 30px; margin-left:10px;">📸</span>
        <span class="brand-text" style="font-size: 16px; font-weight:600;">Admin Pujanbaik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                
                <li class="nav-item">
                    <a href="{{ route('home') }}/" class="nav-link">                        
                        📸
                        <p>Overview</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">                        
                        📆
                        <p>Deadline</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        📊
                        <p>Statistik</p>
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
                    <a href="#" class="nav-link">
                        👥
                        <p>Clients</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        📸
                        <p>Services</p>
                    </a>
                </li>                

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        👤
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        💵
                        <p>Payments</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
