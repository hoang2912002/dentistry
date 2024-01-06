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
                        <form class="multisteps-form__form mb-8" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">{{ $name_page['name'] }}</h5>
                                <p class="mb-0 text-sm">{{ $name_page['total'] }} informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <label>Name</label>
                                            <input class="multisteps-form__input form-control" type="text" placeholder="eg. A11" name="name">
                                            @error('name')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <label>Price</label>
                                            <input class="multisteps-form__input form-control" type="text" placeholder="eg. A11" name="price">
                                            @error('price')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" rows="10" name="description">{{ $serviceModel->description ?? old('description') }}</textarea>
                                           
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <label>Logo</label>
                                            <div class="custom-file">
                                                <input type="file"class="multisteps-form__input form-control @error('logo')  is-invalid @enderror"id="serviceLogo" name="logo"  value="logo">
                                                @error('logo')
                                                    <div class="alert alert-danger alert-dismissible text-white p-1 mt-3"
                                                        role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class=" d-flex justify-content-center pip" id="logo">  
                                                <img style="width: 200px"  src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921'"title="" id="loading_before"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <label>Service Sku</label>
                                            <div class="custom-file ">
                                                <input type="file"class="multisteps-form__input form-control @error('thumbnail')  is-invalid @enderror"id="serviceFile" name="thumbnail[]" multiple value="">
                                                @error('thumbnail')
                                                    <div class="alert alert-danger alert-dismissible text-white p-1 mt-3"
                                                        role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="d-flex justify-content-center mw-100" id="preview_logo">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921"alt="" style="width: 200px;" class="" id="blah">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-auto  d-flex">
                                            <label class="form-check-label mb-0">
                                                <label class="text-sm me-3 my-auto" id="profileVisibility">Activated</label>
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
    var arr = [];
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#serviceFile").on("change", function(e) {
                var clickedButton = this;

                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]

                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $(clickedButton).parents().find("#preview_logo #blah").hide();
                        $(clickedButton).parents().find("#preview_logo .preview_service_sku").hide();
                        $("<div class=\" pip\" id=\"preview_logo\">" +
                            "<span class=\"pip\">" +
                            "<img style=\"width: 200px\" class=\"imageThumb\" src=\"" + e
                            .target.result + "\" title=\"" + file.name + "\" />" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>" +
                            "</div>"
                        ).insertAfter(clickedButton);
                        
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                            if ($(clickedButton).parents().find(
                                    "#preview_logo .imageThumb").prop('src') == null) {
                                arr = [0];
                                $.ajax({

                                    url: '{!! route('service.api') !!}',
                                    data: {
                                        service_id: $('.service_id').val()
                                    },
                                    method: 'post',
                                    success: function(response) {
                                        $('#serviceFile').val('');
                                    }
                                });
                            }
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
            $("#serviceLogo").on("change", function(e) {
                var clickedButton = this;
                $(clickedButton).parents().find("#logo").hide();
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]

                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $(clickedButton).parents().find("#logo #loading_before").hide();
                        $("<div class=\" pip\" id=\"logo\">" +
                            "<span class=\"pip\">" +
                            "<img style=\"width: 200px\" class=\"imageLogo\" src=\"" + e
                            .target.result + "\" title=\"" + file.name + "\" />" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>" +
                            "</div>"
                        ).insertAfter(clickedButton);

                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                            
                            if ($(clickedButton).parents().find("#logo .imageLogo").prop('src') == null) {

                                $.ajax({

                                    url: '{!! route('service.api') !!}',
                                    data: {
                                        service_id: $('.service_id').val()
                                    },
                                    method: 'post',
                                    success: function(response) {
                                        $('#serviceLogo').val('');
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