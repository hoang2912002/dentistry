@extends('admin.layout.main')
@include('admin.layout.form')
@push('css')
    <style>
        input[type="file"] {
            display: block;
        }

        .imageThumb {
            height: auto;
            max-height: 130px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endpush
@section('content')
    <div class="row mb-12">
        <div class="col-12">
            <div class="multisteps-form mb-5">

                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto my-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button"
                                        title="User Info">
                                        <span>User Info</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form mb-8" action="{{ route('user.update',$userModel) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">User Update</h5>
                                <p class="mb-0 text-sm">Private informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Uuid</label>
                                            <input class="multisteps-form__input form-control" type="text" name="uuid" value="{{ $userModel->uuid }}" readonly>
                                        </div>
                                        <div class="col-12 col-sm-6  mt-3 mt-sm-0">
                                            <label>Full name</label>
                                            <input class="multisteps-form__input form-control" type="text" placeholder="eg. Michael" name="name" value="{{ $userModel->name ?? old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Phone number</label>
                                            <input id="phone" class="form-control" type="number" placeholder="+40 735 631 620" name="phone_number" value="{{ $userModel->login->phone_number ?? old('phone_number') }}">
                                            @error('phone_number')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0" >
                                            <label>Birthdate</label>
                                            <input class="multisteps-form__input form-control" type="date" name="birthdate" value="{{ $userModel->birthdate ?? old('birthdate') }}">
                                            @error('birthdate')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Email Address</label>
                                            <input class="multisteps-form__input form-control" type="email" placeholder="eg. argon@dashboard.com" name="email" value="{{ $userModel->login->email ?? old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" id="choices-gender" >
                                                <option value="">Choose gender ...</option>
                                                <option value="1" @if ($userModel->gender === 1) @selected(true) @endif>Male</option>
                                                <option value="0" @if ($userModel->gender === 0) @selected(true) @endif>Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Password</label>
                                            <input class="multisteps-form__input form-control" type="password" placeholder="******" name="password">
                                            @error('password')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Role</label>
                                            <select class="form-control" name="role" id="choices-role" >
                                                <option value="">Choose role ...</option>
                                                @foreach ($groups as $item)
                                                    <option value="
                                                        {{ $item->id }}"
                                                        @if ($item->id === $group_user)
                                                            selected
                                                        @endif    
                                                    >
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                            @error('role')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-auto  d-flex">
                                            <label class="form-check-label mb-0">
                                                <small id="profileVisibility" style="font-weight: bold">Introduction dentist</small>
                                            </label>
                                            <div class="form-check form-switch ms-2">
                                                <input class="form-check-input" type="checkbox" value="1" 
                                                id="btn-infor-dentist" name="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- div toggle dentist --}}
                                    <div class="div-infor-dentist" style="display:none">
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" rows="10" name="description">{{ $dentistInformation[0]->description ?? old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-12">
                                                <label>Avatar</label>
                                                <div class="custom-file">
                                                    <input type="file"class="multisteps-form__input form-control @error('avatar')  is-invalid @enderror"id="dentistAvatar" name="avatar"  value="avatar">
                                                    @error('avatar')
                                                        <div class="alert alert-danger alert-dismissible text-white p-1 mt-3"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class=" d-flex justify-content-center pip" id="avatar">  
                                                    <img style="width: 200px" class="imageLogo" src="{{ isset($dentistInformation[0]->avatar)  ? asset($dentistInformation[0]->avatar) : 'https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921' }}"title="{{$dentistInformation[0]->avatar }}" />
    
                                                </div>
                                            </div>
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
                                            type="submit" title="create">Create</button>
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
@push('js')
    <script>
        $('#btn-infor-dentist').on('click', function() {
            var option = $('#btn-infor-dentist');
            $('.div-infor-dentist').slideToggle();
        })
        $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#dentistAvatar").on("change", function(e) {
                var clickedButton = this;
                $(clickedButton).parents().find("#avatar").hide();
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]

                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $(clickedButton).parents().find("#avatar #loading_before").hide();
                        $("<div class=\" pip\" id=\"avatar\">" +
                            "<span class=\"pip\">" +
                            "<img style=\"width: 200px\" class=\"image\" src=\"" + e
                            .target.result + "\" title=\"" + file.name + "\" />" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>" +
                            "</div>"
                        ).insertAfter(clickedButton);
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                            if ($(clickedButton).parents().find("#avatar .image").prop('src') == null) {
                                $.ajax({
                                    url: '{!! route('service.api') !!}',
                                    data: {
                                        service_id: $('.service_id').val()
                                    },
                                    method: 'post',
                                    success: function(response) {
                                        $('#dentistAvatar').val('');
                                    }
                                });
                            }
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
    </script>
@endpush