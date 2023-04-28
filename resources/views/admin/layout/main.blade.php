<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        Argon Dashboard 2 PRO by Creative Tim
    </title>
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('asset/admin') }}/css/argon-dashboard.min.css?v=2.0.5" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('admin.layout.left_sidebar')
    <main class="main-content position-relative border-radius-lg ">

        @include('admin.layout.header')

        <div class="container-fluid py-4">
            @yield('content')
            @include('admin.layout.footer')
        </div>
    </main>
    @include('admin.layout.right_sidebar')
    
    
    <script src="{{ asset('asset/admin') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="{{ asset('asset/admin') }}/js/plugins/dragula/dragula.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/jkanban/jkanban.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/chartjs.min.js"></script>


    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('asset/admin') }}/js/argon-dashboard.min.js?v=2.0.5"></script>
    <script>
        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
        @endif
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('success') }}");
        @endif
    </script>
</body>

</html>
