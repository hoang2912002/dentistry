@extends('customer.layout.main')
@push('css')
    <style>

        .div-avatar-dentist {
        width: 270px;
        height: 311px;
        overflow: hidden;
        border-radius: 8px;
        }

        .div-avatar-dentist img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all .3s ease;
        }

        .div-avatar-dentist img:hover {
        transform: scale(1.1);
        border-radius: 8px;
        }

    </style>
@endpush
@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="col-12 col-sm-3 mh-100 title-homepage">
            <h1>Hãy đến DentiCare giải quyết vấn đề về răng.</h1>

        </div>
        <div class="col-12 col-sm-9  mt-3 mt-sm-0">
            <div id="description-carousel" class="carousel fade" data-ride="carousel">


                <img src="{{ asset('img/customer') }}/631c2c7c75a7c1edcb0b332c_hero-image.png" alt="">
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
                                    <img alt="Service Icon Image" loading="lazy" src="{{ asset($service->logo) }}"
                                        class="service-icon-image" style="width: 70px;">
                                </div>
                                <h3 class="" style="font-weight: bold;font-size: 23px;font-family: sans-serif">
                                    {{ $service->name }}</h3>

                                <p class=""
                                    style="font-size: 16.6px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: 400;color: #5d5f6c">
                                    {{ $service->description() }}...
                                </p>

                            </div>
                            <div class="footer" style="text-shadow:none">
                                <div class="stats pull-left">
                                    <a href="{{ route('service.serviceDetail', $service->slug) }}" class="text-primary">
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
    <div class="section section-gray ">
        <div class="container">
            <h2 class="section-title">Nha sĩ</h2>
            <br>
            <div class="row" id="profile-cards" >
                @foreach ($groupUsers as $groupUser)
                    {{-- <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">
                                    <img class=" border-gray" src="{{ asset($arr[$groupUser->user->uuid]) }}"
                                    alt="Avatar">
                                    <h4 class="title">{{ $groupUser->user->name }}<br>
                                        <small>{{ $groupUser->group->name }}</small>
                                    </h4>
                                </a>
                            </div>
                           
                        </div>
                        <hr>
                        <div class="footer text-center">
                            <a href="{{ route('doctor.detail',$groupUser->user->uuid) }}" class="btn btn-info btn-round btn-wd" fdprocessedid="iu921b">
                                Thông tin chi tiết</a>
                        </div>
                    </div>
                    </div>  --}}
                    <div class="col-md-4">
                        <div role="listitem" class="team-collection-item w-dyn-item">
                            <div role="list" class="team-collection-list w-dyn-items">
                                <div data-w-id="3d431e6e-2316-e23d-3d57-d3c174247920" class="single-team"
                                    style="">
                                    <div class="team-thumb-block div-avatar-dentist">
                                        <a href="{{ route('dentist.dentistDetail', $groupUser->user->uuid) }}">
                                            <img alt="Team Image" style="width: 270px;height: 311px;border-radius:8px" src="{{ asset($arr[$groupUser->user->uuid]) }}"class="team-thumb-image avatar_dentist">
                                        </a>
                                        
                                    </div>
                                    <div class="team-content-block">
                                        <div style="opacity: 1;" class="team-content"><a href=""
                                                class="team-link-block text-white w-inline-block">
                                                <h3 class="team-member-name">{{ $groupUser->user->name }}</h3>
                                            </a>
                                            
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    
@endsection
@push('js')
@endpush
