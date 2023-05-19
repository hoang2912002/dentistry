@extends('customer.layout.main')
@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="col-12 col-sm-6 mh-100 title-homepage">
            <h1>Hãy đến DentiCare và giải quyết vấn đề về răng của bạn.</h1>
            
        </div>
        <div class="col-12 col-sm-6  mt-3 mt-sm-0">
            <div id="description-carousel" class="carousel fade" data-ride="carousel">


                <img src="{{ asset('img/customer') }}/631c2c7c75a7c1edcb0b332c_hero-image.png"
                    alt="">
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

                            <h3 class="" style="font-weight: 700;">{{ $service->name }}</h3>
                            <br>
                            <h5 class="">Get Shit Done Kit PRO, the most wanted bootstrap kit is here
                            </h5>

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
<div class="section section-gray">
    <div class="container">
        <h2 class="section-title">Bác sĩ</h2>
        <br>
        <div class="row" id="profile-cards">
            @foreach ($groupUsers as $groupUser)
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="../../assets/img/faces/face-2.jpg"
                                        alt="...">
                                    <h4 class="title">{{ $groupUser->user->name }}<br>
                                        <small>{{ $groupUser->group->name }}</small>
                                    </h4>
                                </a>
                            </div>
                            <p class="description text-center"> "Lamborghini Mercy <br>
                                Your chick she so thirsty <br>
                                I'm in that two seat Lambo"
                            </p>
                        </div>
                        <hr>
                        <div class="footer text-center">
                            <a href="{{ route('doctor.detail',$groupUser->user->uuid) }}" class="btn btn-info btn-round btn-wd" fdprocessedid="iu921b">
                                Thông tin chi tiết</a>
                        </div>
                    </div>
                </div> 
            @endforeach
                              
        </div>
        
    </div>
</div>
@endsection