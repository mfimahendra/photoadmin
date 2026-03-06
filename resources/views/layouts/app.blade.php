<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon/esokhari-logo-white.ico') }}" sizes="128x128">
    <title>{{ $title ?? 'ESOKHARI' }}</title>
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Libertinus+Serif+Display&family=Petit+Formal+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.lineicons.com/5.1/line/lineicons.css" rel="stylesheet"/>
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 100% !important;
        }

        .index-title {            
            color: #333;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            height: 100%;
            justify-content: flex-start;
            padding-top: 2%;
            padding-bottom: 2%;
        }

        /* Ensure icon and label are always same size in any sidebar state */
        .nav-sidebar .nav-link i,
        .nav-sidebar .nav-link p {
            font-size: 1.1rem !important;
        }        

    </style>
    <style>
        .brand-logo { width: 30px; height: 30px; margin-left: 23%; display: none; vertical-align: middle; }
        .brand-full { width: auto; height: 30px; margin-left: 5%; display: block; vertical-align: middle; }

        /* When AdminLTE collapses the sidebar it adds sidebar-collapse to body */
        body.sidebar-collapse .brand-logo { display: block; }
        body.sidebar-collapse .brand-full { display: none; }

        /* If you also use a custom sidebar-collapsed class, keep behavior consistent */
        body.sidebar-collapsed .brand-logo { display: block; }
        body.sidebar-collapsed .brand-full { display: none; }

        /* When sidebar is collapsed but opened on hover (AdminLTE adds sidebar-open),
           or when we add our own sidebar-hovered class, show the full logo */
        body.sidebar-collapse.sidebar-open .brand-logo,
        body.sidebar-collapsed.sidebar-open .brand-logo,
        body.sidebar-collapse.sidebar-hovered .brand-logo,
        body.sidebar-collapsed.sidebar-hovered .brand-logo { display: none; }

        body.sidebar-collapse.sidebar-open .brand-full,
        body.sidebar-collapsed.sidebar-open .brand-full,
        body.sidebar-collapse.sidebar-hovered .brand-full,
        body.sidebar-collapsed.sidebar-hovered .brand-full { display: block; }

        /* sidebar active state */
        .nav-sidebar .nav-link.active {
            background-color: #29342c !important;
            color: #ffffff;
        }

        /* make sure icon and text inside active link are white too */
        .nav-sidebar .nav-link.active i,
        .nav-sidebar .nav-link.active p {
            color: #ffffff;
        }
    </style>
    @yield('styles')
</head>

    @guest        
        <section>
            @yield('content')
        </section>

    @else

        <body class="hold-transition sidebar-mini layout-fixed">    
            <div class="wrapper">        
                @include('components.navbar')
                @include('components.sidebar')
                
                <div class="content-wrapper">
                    <!-- Main content -->
                    <section class="content">
                        @yield('content')
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <footer class="main-footer" style="padding:2px 1rem;">
                    @include('components.footer')
                </footer>
                
                {{-- <aside class="control-sidebar control-sidebar-dark">            
                </aside> --}}
                
            </div>

    @endguest
            
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('js/currencyIDR.js') }}"></script>
        @yield('scripts')
        
        <script>
            const success_audio = new Audio("{{ asset('audio/success.mp3') }}");
            const error_audio = new Audio("{{ asset('audio/error.mp3') }}");
            // sidebar nav_link isOpening when open that page
            $(document).ready(function() {
                var url = window.location;            
                // for sidebar menu entirely but not cover treeview
                $('ul.nav-sidebar a').filter(function() {
                    return this.href == url;
                }).addClass('active');
                // for treeview
                $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
            });
        </script>
        <script>
            // Ensure sidebar-collapsed is set on load if needed
            document.addEventListener('DOMContentLoaded', function() {
                var body = document.body;

                // Hover over the sidebar explicitly toggles a sidebar-hovered state
                var sidebar = document.querySelector('.main-sidebar');
                if (sidebar) {
                    sidebar.addEventListener('mouseenter', function () {
                        body.classList.add('sidebar-hovered');
                    });
                    sidebar.addEventListener('mouseleave', function () {
                        body.classList.remove('sidebar-hovered');
                    });
                }
            });

            // Toggle sidebar collapsed state (example usage)
            window.toggleSidebar = function() {
                var body = document.body;
                body.classList.toggle('sidebar-collapsed');
            };
        </script>
    </body>

</html>
