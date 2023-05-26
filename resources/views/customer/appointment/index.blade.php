@extends('customer.layout.main')

@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="col-12 col-sm-6 mh-100 title-homepage">
            <h1>Đặt lịch hẹn</h1>
        </div>

    </div>
@endsection
@push('css')
    <style>
        .alert-form-appointment{
            margin-top: 10px
        }
    </style>
@endpush
@section('content')
    <div class="section">
        <div class="container">
            <h2 class="section-title">Phiếu đặt lịch hẹn</h2>
            <div class="row">
                <div class="col-md-12 ">
                    <form role="form" id="contact-form" method="post" action="{{ route('appointment.store') }}">
                        @csrf
                        @method('POST')
                        <div class="multisteps-form__content">
                            <div class="form-group">
                                <div class="row mt-3">
                                    <input class="multisteps-form__input form-control" type="hidden" placeholder="eg. Michael" name="user_uuid" value="{{ Auth::user()->User->uuid ?? '' }}">
                                    <div class="col-12 col-sm-6">
                                        <label>Họ và tên</label>
                                        <input class="multisteps-form__input form-control" type="text" placeholder="eg. Michael" name="name" value="{{ Auth::user()->User->name ?? '' }}">
                                        @error('name')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6  mt-3 mt-sm-0">
                                        <label>Địa chỉ email</label>
                                        <input class="multisteps-form__input form-control" type="email" placeholder="eg. argon@dashboard.com" name="email" value="{{ Auth::user()->email ?? '' }}">
                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6 ">
                                        <label>Số điện thoại</label>
                                        <input id="phone" class="form-control" type="number" placeholder="+40 735 631 620" name="phone_number" value="{{ Auth::user()->phone_number ?? '' }}">
                                        @error('phone_number')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Ngày hẹn</label>
                                        <input class="datepicker form-control" type="text" name="date_appointment" />
                                        @error('date_appointment')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6 ">
                                        <label>Giờ khám</label>
                                        <select class="form-control" name="shift_id" id="choices-shift" >
                                            <option value="">Chọn giờ khám ...</option>
                                            @foreach ($shifts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('shift_id')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Bác sĩ</label>
                                        <select class="form-control" name="doctor_uuid" id="choices-shift" >
                                            <option value="">Chọn bác sĩ ...</option>
                                            @foreach ($groupUsers as $item)
                                                <option value="{{ $item->user->uuid }}">{{ $item->user->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('doctor_uuid')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Ghi chú</label>
                                <textarea name="note" class="form-control" id="message" rows="6"></textarea>
                                @error('note')
                                    <div class="alert alert-danger alert-dismissible text-white p-1 mt-3 alert-form-appointment" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="submit" style="display: flex;justify-content: center">
                                <button type="submit" class="btn btn-block btn-lg btn-fill btn-info" fdprocessedid="i67w19" style="width: 20%;">Đặt lịch</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="space-50"></div>
@endsection
