@extends('customer.layout.main')
@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="small-info title-homepage">
            <h1>{{ $serviceDetailModel->name }}</h1>
            <div class="div-address">
                <a href="{{ route('.index') }}" class="redirect-a">Trang chủ</a> &nbsp;  <span class="current-address"> -</span>  &nbsp;  
                <a href="{{ route('service.service') }}" class="redirect-a">Dịch vụ</a> &nbsp;  <span class="current-address"> -</span>  &nbsp;
                <span class="current-address">Dịch vụ</span>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Archivo:300,regular,500,600,700,800"]
            }
        });
    </script>
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <style>
        .service-name {
            font-family: helvetica neue, open sans, Arial, sans-serif;
            ;
            font-size: 30px;
            font-weight: 700;
        }
    </style>
    <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}
        
        /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active {
          background-color: #717171;
        }
        
        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
          animation-delay: 1s
        }
        
        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .text {font-size: 11px}
        }
        .btn_service{
            width: 300px;
            min-width: 200px;
            height: 40px;
            margin: 2px 0px 4px 0px;
            border-radius: 5px;
            border: none;
            background-color: #f5f3ff;
            color: #5d5f6c;
            transition: background-color 300ms ease, color 300ms ease;
            font-weight: bold;
            font-family: Archivo, sans-serif;
            font-size: 17px;
            transition-delay: 0.01s;
            display: flex;
            
        }
        .btn_service>a{
            color: #5d5f6c;
            width: 300px;
            min-width: 200px;
            
            text-align: left;
            margin: auto
        }
        .btn_service>a>i{
            margin-left: 5%;
            margin-right: 5%;
            font-size: 17px
        }
        .btn_service:hover{
            background-color: rgb(90, 72, 224);
            color: rgb(255, 255, 255);
            cursor: pointer;
        }
        .btn_service:hover a{
            
            color: rgb(255, 255, 255);
            cursor: pointer;
        }
        
        </style>
@endpush
@section('content')
    <div class="section section-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="section-title" style="margin-top: unset">Dịch vụ</h2>
                    @forEach($services as $each)
                        
                        <div class="d-flex">
                            <div type="button" class="btn_service">
                                <a href="{{ route('service.serviceDetail',$each->slug) }}"  rel="noopener noreferrer" >
                                <i class='bx bx-chevrons-right'></i>{{ $each->name }}
                                </a>
                                
                            </div>
                        </div>
                    @endforeach
                    
                    
                    <h2 class="text-danger">{{ $serviceDetailModel->price() }}</h2>
                </div>
                <div class="col-md-8">
                    <div class="slideshow-container" style="width: 100%;
                    height: 370px;background-color: rgb(251, 249, 249);display: flex;border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                        @forEach($services_sku as $each)
                            <div class="mySlides fade"  >
                                <img src="{{ asset($each->service_sku) }}" style="object-fit: contain; width: 100%;
                                height: 100%;text-align: center;justify-items: center;border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;" >
                                
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <div style="text-align:center">
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-service-section">
        <div class="container w-container">
            <div class="single-service-wrapper">
                <div data-w-id="8d2dc484-bd7a-ee1e-715e-96e0f79c0df7"
                    style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                    class="single-service-sidebar">
                    <div class="single-service-sidebar-box">
                        <div class="single-service-sidebar-box-content">
                            
                            <div class="service-box">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="single-service-details-content">
                    <div class="single-service-richtext-content w-richtext">
                        <h2>{{ $serviceDetailModel->name }}</h2>
                        <p><?php echo nl2br($serviceDetailModel->description) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space"></div>
@endsection
@push('js')
<script>
    
    let slideIndex = 0;
    showSlides();

    function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    for (i = 0; i < slides.length; i++) {
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
    let queue = Effect.Queues.getElementsByClassName( 'mySlides' );
    queue.each( function( effect ) { effect.cancel(); } );}
    }
    </script>
@endpush
