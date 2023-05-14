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
                                        title="{{ $name_page['total'] }} Info">
                                        <span>{{$name_page['total']}} Information</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form mb-8" action="{{ route('medicine.update',$medicineModel) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">{{ $name_page['name'] }}</h5>
                                <p class="mb-0 text-sm">{{ $name_page['total'] }} informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Name</label>
                                            <input class="multisteps-form__input form-control" type="text" placeholder="eg. Michael" name="name" value="{{ $medicineModel->name  ?? old('name')}}">
                                            @error('name')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6  mt-3 mt-sm-0">
                                            <label>Root</label>
                                            <input  class="form-control" type="text" placeholder="VietNam" name="root" value="{{ $medicineModel->root  ?? old('root')}}">
                                            @error('root')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Manufacturer</label>
                                            <select class="form-control" name="manufacturer_id" id="choices-manufacturer" >
                                                <option value="">Choose manufacturer ...</option>
                                                @foreach ($manufacturer as $item)
                                                    <option value="
                                                    {{ $item->id }}"
                                                    @if ($item->id === $medicineModel->manufacturer_id)
                                                        selected
                                                    @endif    
                                                >
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                                
                                            </select>
                                            @error('manufacturer_id')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Type</label>
                                            <select class="form-control" name="type_of_medicine_id" id="choices-type" >
                                                <option value="">Choose tpye ...</option>
                                                @foreach ($type as $item)
                                                    <option value="
                                                    {{ $item->id }}"
                                                    @if ($item->id === $medicineModel->type_of_medicine_id)
                                                        selected
                                                    @endif>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                            @error('type_of_medicine_id')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Quantity</label>
                                            <input class="multisteps-form__input form-control" type="number" placeholder="eg. 20" name="quantity" value="{{ $medicineModel->quantity  ?? old('quantity')}}">
                                            @error('quantity')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6  mt-3 mt-sm-0">
                                            <label>Price</label>
                                            <input class="form-control" type="text" placeholder="100.000VNĐ" name="price" value="{{ $medicineModel->input_price()  ?? old('price')}}">
                                            @error('price')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
