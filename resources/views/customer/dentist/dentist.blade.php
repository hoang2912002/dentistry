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
        <div class="small-info title-homepage ">
            <h1>Nha sĩ~</h1>
            <div class="div-address">
                <a href="{{ route('.index') }}" class="redirect-a">Trang chủ</a> &nbsp;  <span class="current-address"> -</span>  &nbsp;  <span class="current-address">Nha sĩ</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="section section-white">
    <div class="container">
        <h2 class="section-title">Nha sĩ</h2>
        <br>
        <div class="row">
            @foreach ($groupUsers as $groupUser)
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