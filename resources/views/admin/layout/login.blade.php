<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('asset/admin') }}/img/favicon.png">
    <title>
        Login admin page
    </title>


    <link rel="canonical" href="https://www.creative-tim.com/product/corporate-ui-dashboard-pro" />

    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Corporate UI bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, soft design, soft dashboard bootstrap 5 dashboard">
    <meta name="description"
        content="Corporate UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Corporate UI Dashboard PRO by Creative Tim">
    <meta name="twitter:description"
        content="Corporate UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/727/original/corporate-ui-dashboard-pro.jpg?1678117894">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Corporate UI Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url"
        content="https://demos.creative-tim.com/corporate-ui-dashboard-pro/pages/dashboards/default.html" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/727/original/corporate-ui-dashboard-pro.jpg?1678117894" />
    <meta property="og:description"
        content="Corporate UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
        rel="stylesheet" />


    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-svg.css" rel="stylesheet" />


    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="{{ asset('asset/admin') }}/css/nucleo/nucleo-svg.css" rel="stylesheet" />

    <link href="{{ asset('asset/admin') }}/css/corporate-ui-dashboard.min.css?v=1.0.0" rel="stylesheet" />



</head>

<body class="bg-gray-100">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <main class="main-content  mt-0">
        <div class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
            style='background-image:url("{{asset('asset/admin')}}/img/bg-blue.jpg")'>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="mx-auto text-center col-lg-10">
                        <h1 class="mt-10 mb-2 text-white">Dentistry Admin page!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="mx-auto col-xl-4 col-lg-6 col-md-7">
                    <div class="card z-index-0">
                      <div class="pt-4 text-center card-header">
                          <h5>Sign In</h5>

                      </div>
                      <p class="my-1 text-center lh-base">Enter your email and password</p>
                      <div class="px-4 card-body">
                          <form role="form" class="text-start" method="POST" action="{{route('login.process')}}">
                              @csrf
                              @method('POST')
                              <div class="mb-3">
                                  <input type="text" class="form-control  
                                  @error('email')
                                    is-invalid
                                  @enderror" placeholder="Enter your email address" aria-label="Email" name="email">
                                  @error('email')
                                      <span id="exampleInputEmail1-error" class="error invalid-feedback mb-0" style="font-size: 15px">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="mb-3 pt-2">
                                  <input type="password" class="form-control @error('password')
                                    is-invalid
                                  @enderror" placeholder="Enter your password" aria-label="Password" name="password">
                                  @error('password')
                                    <span id="exampleInputEmail1-error" class="error invalid-feedback mb-0" style="font-size: 15px">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="form-check form-switch d-flex pt-2">
                                  <input class="form-check-input" type="checkbox" id="rememberMe">
                                  <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                              </div>
                              <div class="text-center pt-2">
                                  <button type="submit" class="my-4 mb-2 btn btn-dark w-100 ">Sign in</button>
                              </div>
                          </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @error('success')
        <script>
            successMessage('{{ $message }}');
        </script>
    @enderror
    @error('error')
        <script>
            errorMessage('{{ $message }}');
        </script>
    @enderror
    <script src="{{ asset('asset/admin') }}/js/core/popper.min.js"></script>

    <script src="{{ asset('asset/admin') }}/js/core/bootstrap.min.js"></script>
    {{-- <script src="{{ asset('asset/admin') }}/js/plugins/perfect-scrollbar.min.js"></script> --}}
    <script src="{{ asset('asset/admin') }}/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="{{ asset('asset/admin') }}/js/plugins/dragula/dragula.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/plugins/jkanban/jkanban.js"></script>


    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- 
<script src="{{ asset('asset/admin') }}/js/corporate-ui-dashboard.min.js?v=1.0.0"></script> --}}
    {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7bd4f37949554091","version":"2023.3.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}'
        crossorigin="anonymous"></script> --}}
</body>

</html>
