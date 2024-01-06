@extends('customer.layout.main')
@push('css')
    <style>
        .information_dentist{
            font-family: Archivo, sans-serif;
            color: #5d5f6c;
            font-size: 17px;
            line-height: 30px;
            font-weight: 400;
            margin: 0;
            min-height: 460px;
            background-color: #f5f3ff;
            border-radius: 15px; 
            height: 100%;
        }
        .team-contact-block{
            box-sizing: border-box;
            color: rgb(93, 95, 108);
            display: flex;
            flex-wrap: wrap;
            font-family: Archivo, sans-serif;
            font-size: 17px;
            font-weight: 400;
            height: 57px;
            line-height: 30px;
            row-gap: 30px;
            text-size-adjust: 100%;
            min-height: 140px;
            margin-top: 30px;
            flex-wrap: nowrap;
        }
        .team-single-contact{
            align-items :center;
            box-sizing :border-box;
            color :rgb(93, 95, 108);
            column-gap :14px;
            display :flex;
            font-family :Archivo, sans-serif;
            font-size :15px;
            font-weight :400;
            height :57px;
            line-height :30px;
            text-size-adjust :100%;
            width: 241px;
            margin-bottom: 10px
        }
        .team-details-image{
            border-radius: 15px; 
        }
        .team-icon-block{
            align-items: center;
            background-color: rgb(255, 255, 255);
            border-bottom-color: rgb(229, 227, 242);
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-style: solid;
            border-bottom-width: 5px;
            border-left-color: rgb(229, 227, 242);
            border-left-style: solid;
            border-left-width: 5px;
            border-right-color: rgb(229, 227, 242);
            border-right-style: solid;
            border-right-width :5px;
            border-top-color: rgb(229, 227, 242);
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
            border-top-style: solid;
            border-top-width: 5px;
            box-sizing: border-box;
            color: rgb(93, 95, 108);
            display: flex;
            font-family: Archivo, sans-serif;
            font-size :17px;
            font-weight: 400;
            height: 53px;
            justify-content :center;
            line-height: 30px;
            overflow-x: hidden;
            overflow-y: hidden;
            text-size-adjust: 100%;
            width: 53px;
            -webkit-box-align :center;
            -webkit-box-pack: center;
        }
        .contact-number{
            background-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            color: rgb(11, 15, 33);
            cursor: pointer;
            display: inline;
            font-family: Archivo, sans-serif;
            font-size: 20px;
            font-weight: 700;
            height: auto;
            line-height: 25px;
            text-decoration-colo: rgb(11, 15, 33);
            text-decoration-line: none;
            text-decoration-style: solid;
            text-decoration-thickness: auto;
            text-size-adjust: 100%;
            transition-behavior: normal;
            transition-delay: 0s;
            transition-duration: 0.3s;
            transition-property: color;
            transition-timing-function: ease;
        }
        .appointment{
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 15px; 
            padding-bottom: 10px 
        }
    </style>
@endpush
@section('title')
    <div class="col-12 col-lg-12 m-auto div-title-homepage">
        <div class="small-info title-homepage">
            <h1>{{ $dentistDetailModel->name }}</h1>
            <div class="div-address">
                <a href="{{ route('.index') }}" class="redirect-a">Trang chủ</a> &nbsp; <span class="current-address"> -</span>
                &nbsp;
                <a href="{{ route('dentist.dentist') }}" class="redirect-a">Nha Sĩ</a> &nbsp; <span class="current-address">
                    -</span> &nbsp;
                <span class="current-address">{{ $dentistDetailModel->name }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="section section-white">
        <div class="container">
            <div class="row">
                
                    <div class="col-md-6 avatar" data-w-id="b9fdf0a2-edf8-7d36-9b70-07dc6a6b42a3"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        class="team-details-image-side">
                        <div class="team-details-thumbnail"><img alt="Anisha Kaber" loading="lazy" style="min-height: 460px; min-width: 400px"
                                src="{{ asset($dentistDetailModel->avatar) }}"
                                class="team-details-image"></div>
                    </div>
                    <div class="col-md-6 information_dentist" data-w-id="ef705794-c93d-f9f5-dd9e-2cb63879c934"
                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                        class="team-details-content">
                        <div class="team-details-inner">
                            <div class="team-meta-block">
                                <h2 class="team-name" style="color: rgb(11, 15, 33);font-size: 30px;font-weight: 600">{{ $dentistDetailModel->name }}</h2>
                                <div class="team-title">{{ $dentistDetailModel->group_user[0]->name }}</div>
                            </div>
                            <p class="team-bio-text" style="column-gap: 30px;"><?php echo nl2br($dentistDetailModel->description) ?></p>
                            <div class="team-contact-block">
                                <div class="team-single-contact">
                                    <div class="team-icon-block"><img
                                            src="https://assets.website-files.com/631c0193728e6464834a53ea/632990ff5c98771ca724f36b_call.svg"
                                            loading="lazy" alt="Call Icon"></div>
                                    <div class="contact-block">
                                        <div class="contact-text" style="color: rgb(90, 72, 224);font-family: Archivo, sans-serif;font-size: 13px;font-weight: 600">CALL NOW:
                                        </div><a href="tel:+89568748816"class="contact-number">{{ $dentistDetailModel->login->phone_number }}</a>
                                    </div>
                                </div>
                                <div class="team-single-contact">
                                    <div class="team-icon-block"><img
                                            src="https://assets.website-files.com/631c0193728e6464834a53ea/632990ff5c98771ca724f36b_call.svg"
                                            loading="lazy" alt="Call Icon"></div>
                                    <div class="contact-block">
                                        <div class="contact-text" style="color: rgb(90, 72, 224);font-family: Archivo, sans-serif;font-size: 13px;font-weight: 600">EMAIL NOW:</div><a href="mailto:info@gmail.com"
                                            class="contact-number">{{ $dentistDetailModel->login->email }}</a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
    <div class="space"></div>
    <div class="section ">
        <div class="container appointment">
            <h2 class="section-title">Phiếu đặt lịch hẹn</h2>
            <div class="row ">
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
                                                @if ($item->user->uuid === $dentistDetailModel->uuid)
                                                    
                                                @endif
                                                <option {{($item->user->uuid == $dentistDetailModel->uuid) ? 'selected' : '' }} value="{{ $item->user->uuid }}">{{ $item->user->name }}</option>
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
@endsection
