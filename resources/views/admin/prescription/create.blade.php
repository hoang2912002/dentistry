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
                        <form class="multisteps-form__form mb-8" action="{{ route('prescription.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">{{ $name_page['name'] }}</h5>
                                <p class="mb-0 text-sm">{{ $name_page['total'] }} informations</p>
                                <div class="multisteps-form__content">
                                    <div class="col-12 col-sm-6">
                                        <label>Full name</label>
                                        {{-- <input class="multisteps-form__input form-control" type="text" placeholder="eg. Michael" name="name" value="{{  }}"> --}}
                                        @error('name')
                                            <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <label>Medicine</label>
                                            <select class="form-control" name="medicine[]" id="choices-medicine"  multiple="multiple">
                                                @foreach ($medicines as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Shift</label>
                                            <select class="form-control" name="shift_id[]" id="choices-shift-medicine" multiple="multiple">
                                                @foreach ($shifts as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                </select>
                                            @error('shift')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Quantity</label>
                                            <input class="multisteps-form__input form-control" type="number" placeholder="eg. 20" name="total_quantity">
                                            @error('quantity')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <label>Amount of time</label>
                                            <input class="multisteps-form__input form-control" type="number" placeholder="eg. 1" name="amount_of_time">
                                            @error('amount_of_time')
                                                <div class="alert alert-danger alert-dismissible text-white p-1 mt-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Price</label>
                                            <input class="form-control" type="text" placeholder="100.000VNĐ" name="total_price">
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
        var score = 0;
        var arr = [];
        // $('#choices-medicine').siblings().find('.choices__button').on('change',function(){
        //     $(this).data('clicked', true);
        //     console.log(11);
        // });
        
        $('#choices-medicine').on('change',function(){
           
            var medicine = $('#choices-medicine'); 
            arr = medicine.val();
            $.ajax({
                type: "POST",
                url: "{{ route('prescription.api') }}",
                data: {
                    medicine: arr
                },
                success: function (response) {
                    price = parseInt(JSON.parse(response)).toLocaleString() + 'VNĐ';
                    $('input[name^="total_price"]').val(price);
                }
            });
            $('input[name^="total_quantity"]').val(arr.length);
        })        
    </script>
@endpush