<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/customer') }}/icon_page.png">
    <link rel="canonical" href="https://www.creative-tim.com/product/get-shit-done-pro" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nha Khoa G37</title>
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg">
    <meta property="og:url" content="https://gsdk.creative-tim.com/home" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg" />
    <meta property="og:site_name" content="Creative Tim" />
    <link href="{{ asset('asset/customer') }}/css/bootstrap3/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('asset/customer') }}/css/gsdk/gsdk.css" rel="stylesheet" />
    <link href="{{ asset('asset/customer') }}/css/examples.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('asset/admin') }}/css/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/fontawesome-free/all.min.css">

    <!--Toastr-->
    <link rel="stylesheet" href="{{ asset('asset/admin') }}/css/toastr/toastr.min.css">
   
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <style>
        .background_homepage {
            background-image:
                url("{{ asset('img/customer/631c5c05743ea914ce432649_hero-image-bg.png') }}");
        }

        .div-title-homepage {
            align-items: center;
            display: flex;
            justify-content: center
        }

        .title-homepage>h3,
        .title-homepage>h1,
        .title-homepage>h2,
        .title-homepage>h4
        .title-homepage>h5 {
            color: white;
            font-family: Archivo, sans-serif;
            font-weight: bold
        }
        .div-address{
            width: 100%;
            text-align: center;
        }
        .redirect-a{
            color: rgb(255, 255, 255);
            cursor: pointer;
            font-family: Archivo, sans-serif;
            font-size: 17px;
            font-weight: 400;
            line-height: 30px;
            text-align: center;
            text-decoration-line: none;
            transition-delay: 0.05s;
            justify-content: center;
        }
        .redirect-a:hover{
            color: rgb(103, 185, 48);
            
        }
        .current-address{
            font-size: 17px;
            font-weight: 400;
            line-height: 30px;
            color: rgb(255, 255, 255);
        }
    
        .card-service:hover {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .card-service>h3,
        .card-service>h4,
        .card-service>a {
            font-family: Archivo, sans-serif;
            color: black;
        }
        .background-footer{
            background-image: url("{{ asset('img/customer/6327035de6b80312b6eaed9a_footer-bg.png')}}");
        }

    </style>
    @stack('css')
</head>

<body class="home">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    @include('customer.layout.header')
    <div class="wrapper">
        
        <div class="section section-description background_homepage ">

            <div class="container tim-container">
                <div class="row  mt-6">
                    <div class="space"></div>

                    @yield('title')
                    
                </div>
            </div>
        </div>
        <div class="space-50"></div>
        @yield('content')
        @include('customer.layout.footer')
    </div>
</body>
<script src="{{ asset('asset/customer') }}/js/jquery/jquery.js" type="text/javascript"></script>
<script src="{{ asset('asset/customer') }}/js/jquery/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="{{ asset('asset/customer') }}/js/bootstrap/bootstrap.js" type="text/javascript"></script>

<script src="{{ asset('asset/customer') }}/js/gsdk/gsdk-morphing.js"></script>
<script src="{{ asset('asset/customer') }}/js/gsdk/gsdk-radio.js"></script>
<script src="{{ asset('asset/customer') }}/js/gsdk/gsdk-bootstrapswitch.js"></script>
<script src="{{ asset('asset/customer') }}/js/bootstrap/bootstrap-select.js"></script>
<script src="{{ asset('asset/customer') }}/js/bootstrap/bootstrap-datepicker.js"></script>
<script src="{{ asset('asset/customer') }}/js/chartist.min.js"></script>
<script src="{{ asset('asset/customer') }}/js/jquery/jquery.tagsinput.js"></script>
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('asset/admin') }}/js/toastr/toastr.min.js"></script>
<script src="{{ asset('asset/customer') }}/js/get-shit-done.js"></script>
<script type="text/javascript">
    var big_image;

    var params_url = '';

    $().ready(function(){
        responsive = $(window).width();

        $(window).on('scroll', gsdk.checkScrollForTransparentNavbar);

        if (responsive >= 768){
            big_image = $('.parallax-image').find('img');

            $(window).on('scroll',function(){
                parallax();
            });
        }

        var coupon = getUrlParameter('coupon');
        var ref = getUrlParameter('ref');

        has_param = 0;

        $('[rel="tooltip"]').tooltip();

        if(coupon){
            addQSParm("coupon", coupon);
        }
        if(ref){
            addQSParm("ref", ref);
        }

        if(coupon){
            $('#buyButton').html('Buy now with 25% Discount');
        }

        if(ref || coupon){
            kit_link = $(".navbar-brand").attr('href');
            $(".navbar-brand").attr('href', kit_link + params_url);

            $('.navbar-right a').each(function(){
                href = $(this).attr('href');
                if(href != '#'){
                    $(this).attr('href',href + params_url);
                }
            });
        }


    });

   var parallax = function() {
        var current_scroll = $(this).scrollTop();

        oVal = ($(window).scrollTop() / 3);
        big_image.css('top',oVal);
    };

    function getUrlParameter(sParam){
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam){
                return sParameterName[1];
            }
        }
    }
</script>
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
@stack('js')
</html>
