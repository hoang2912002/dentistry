@extends('admin.layout.main')
@include('admin.layout.form')
@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <div class="multisteps-form mb-5">

                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto my-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button"
                                        title="User Info">
                                        <span>{{ $name_page['total'] }} Information</span>
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form mb-8" action="{{ route('book.update',$bookModel) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">{{ $name_page['name'] }}</h5>
                                <p class="mb-0 text-sm">{{ $name_page['total'] }} informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>User uuid</label>
                                            <input class="multisteps-form__input form-control user_uuid" type="text"  name="uuid" value="{{ $bookModel->user_uuid  ??  'Null'}}" readonly>
                                            @error('uuid')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6  mt-3 mt-sm-0">
                                            <label>User name</label>
                                            <input class="multisteps-form__input form-control user_name" id="text" class="form-control" type="text" placeholder="+40 735 631 620" name="name" value="{{ $bookModel->name  ?? old('name')}}">
                                            @error('name')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Email Address</label>
                                            <input class="multisteps-form__input form-control user_email" type="email" placeholder="eg. argon@dashboard.com" name="email" value="{{ $bookModel->email  ?? old('email')}}">
                                            @error('email')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-12 col-sm-6  mt-3 mt-sm-0">
                                            <label>Phone number</label>
                                            <input id="phone" class="form-control user_phone_number" type="number" placeholder="+40 735 631 620" name="phone_number" value="{{ $bookModel->phone_number  ?? old('phone_number')}}">
                                            @error('phone_number')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Shift</label>
                                            <select class="form-control" name="shift_id" id="shift" >
                                                <option value="">Choose shift ...</option>
                                                    @foreach ($shifts as $item)
                                                    <option value="
                                                        {{ $item->id }}"
                                                        @if ($item->id === $bookModel->shift_id)
                                                            selected
                                                        @endif    
                                                    >
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            @error('shift')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Doctor</label>
                                            <select class="form-control" name="doctor_uuid" id="choices-doctor" >
                                                <option value="">Choose doctor ...</option>
                                                @foreach ($doctors as $item)
                                                <option value="
                                                    {{ $item->user->uuid }}"
                                                    @if ($item->user->uuid === $bookModel->doctor_uuid)
                                                        selected
                                                    @endif    
                                                >
                                                    {{ $item->user->name }}
                                                </option>
                                            @endforeach
                                            </select>
                                            @error('doctor')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label>Date appointment</label>
                                            <input class="multisteps-form__input form-control" type="date" name="date_appointment" value="{{ $bookModel->date_appointment  ?? old('date_appointment')}}">
                                            
                                            @error('date_appointment')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <label>Note</label>
                                            <textarea class="multisteps-form__input form-control" name="note" id="" cols="30" rows="10" >{{ $bookModel->note  ?? old('note')}}</textarea>
                                            @error('date_appointment')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-auto  d-flex">
                                            <label class="form-check-label mb-0">
                                                <small id="profileVisibility">Activated</small>
                                            </label>
                                            <div class="form-check form-switch ms-2">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked="" onchange="visible()" name="activated" value="1">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                            type="submit" title="create">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
