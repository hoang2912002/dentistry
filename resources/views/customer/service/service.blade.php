@extends('customer.layout.main')

@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="small-info title-homepage ">
            <h1>Dịch vụ</h1>
            <div class="div-address">
                <a href="{{ route('.index') }}" class="redirect-a">Trang chủ</a> &nbsp;  <span class="current-address"> -</span>  &nbsp;  <span class="current-address">Dịch vụ</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="section section-white">
    <div class="container">
        <h2 class="section-title">Dịch vụ</h2>
        <br>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="card card-background card-service">
                        <div class="image"
                            style="background-image: url(&quot;../../assets/img/card-full-2.jpg&quot;); background-position: center center; background-size: cover;">

                            <div class="filter filter-white"></div>
                        </div>
                        <div class="content" style="text-shadow:none">
                            <div class="img-service" style="">
                                <img alt="Service Icon Image" loading="lazy" src="{{ asset($service->logo) }}" class="service-icon-image" style="width: 70px;">
                            </div>
                            <h3 class="" style="font-weight: bold;font-size: 23px;font-family: sans-serif">{{ $service->name }}</h3>
                            
                            <p class="" style="font-size: 16.6px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: 400;color: #5d5f6c">
                                {{ $service->description() }}...
                            </p>

                        </div>
                        <div class="footer" style="text-shadow:none">
                            <div class="stats pull-left">
                                <a href="{{ route('service.serviceDetail',$service->slug) }}" class="text-primary">
                                    <span style="font-weight: 600;font-size: 14px">Chi tiết +</span>
                                </a>
                            </div>
                            <div class="stats pull-right">
                                <i class="fa fa-clock-o"></i> 3 hours ago
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection