<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Section</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/ready.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/demo.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">


    <script src="{{asset('dist/css/app.js')}}"></script>

 
</head>
<body>
    <div class="wrapper">

        <!-- Admin Header Here -->

         @include('admin.layout.includes.header')

         <!-- End Header -->


            <!-- Admin SideBar Here -->

             @include('admin.layout.includes.sidenav')

            <!-- End of Admin Side Bar -->

            <div class="main-panel">
                <div class="content">

                    <!-- Other Pages Content Link Here -->

                    @yield('content')

                    <!-- End of Other Pages Content Link Here -->

                </div>
                <!-- Include Footer -->

                @include('admin.layout.includes.footer')


                <!-- Include Footer -->
            </div>
        </div>
   

</body>

 <script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
 <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
 <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/chartist/chartist.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>
 <script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
 <script src="{{asset('assets/js/ready.min.js')}}"></script>
 <script src="{{asset('assets/js/demo.js')}}"></script>

</html>