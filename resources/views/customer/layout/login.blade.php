<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        DantalCare
    </title>


    <link rel="canonical" href="https://www.creative-tim.com/product/material-kit-pro" />

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link id="pagestyle" href="{{ asset('asset/customer') }}/css/material-kit-pro.min.css?v=3.0.4" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    
</head>

<body class="sign-in-cover bg-gray-200">
    <div class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
        style='background-image:url("{{asset('img/customer/6327035de6b80312b6eaed9a_footer-bg.png')}}")'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="mx-auto text-center col-lg-10">
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mb-4">
        <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('asset/admin') }}/js/core/popper.min.js"></script>

    <script src="{{ asset('asset/admin') }}/js/core/bootstrap.min.js"></script>
    {{-- <script src="{{ asset('asset/admin') }}/js/plugins/perfect-scrollbar.min.js"></script> --}}
    <script src="{{ asset('asset/admin') }}/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="{{ asset('asset/admin') }}/js/plugins/dragula/dragula.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/jkanban/jkanban.js"></script>
</body>

</html>
