@extends('customer.layout.main')
@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="small-info title-homepage">
            <h1>{{ $serviceDetailModel->name }}</h1>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .service-name{
            font-family: helvetica neue,open sans,Arial,sans-serif;;
            font-size: 30px;
            font-weight: 700;
        }
    </style>
@endpush
@section('content')
<div class="section section-white">
    <div class="container">
        <h2 class="section-title">Dịch vụ</h2>
        <br>
        <div class="row">
            {{-- @foreach ($services as $service) --}}
                <div class="col-md-4">
                    <h2 class="sidebar-title service-name">{{ $serviceDetailModel->name }}</h2>
                    <br>
                    <h2 class="text-danger">{{ $serviceDetailModel->price() }}</h2>
                </div>
                <div class="col-md-8">
                    <div class="space-50"></div>
                    <h1>{{ $serviceDetailModel->name }}</h1>
                    {{-- <span>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with esktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.

                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with esktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </span> --}}
                </div>
            {{-- @endforeach --}}
        </div>

    </div>
</div>
<div class="space"></div>
@endsection