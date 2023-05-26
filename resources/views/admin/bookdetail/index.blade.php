@extends('admin.layout.main')
@section('content')
    <div class="row mb-lg-5">
        <div class="col-lg-6 mx-auto">
            <div class="card my-5">
                <div class="card-header p-3 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>{{ $name_page['name'] ?? ' ' }}</h6>
                            <p class="text-sm mb-0">
                                <b>{{ $bookModel->date_appointment() . ' ' . $bookModel->shift() }}</b>
                            </p>
                        </div>
                        <a href="{{ route('book.index') }}" class="btn bg-gradient-secondary ms-auto mb-0">Back</a>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <hr class="horizontal dark mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="d-flex">
                                <div>
                                    <h6 class="text-lg mb-0 mt-2">Status</h6>
                                    <span class="badge badge-sm bg-gradient-success">Success</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <h6 class="text-lg mb-0 mt-2">Doctor</h6>
                                    <h6>{{ $bookModel->doctor() }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                            <a href="{{ route('prescription.index') }}" class="btn bg-gradient-info mb-0">Prescriptions</a>
                        </div>
                    </div>
                    <hr class="horizontal dark mt-4 mb-4">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <h6 class="mb-3 mt-4">User Information:</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">{{ $bookModel->name }}</h6>
                                        <span class="mb-2 text-xs">User uuid: <span
                                                class="text-dark font-weight-bold ms-2">{{ $bookModel->user_uuid ?? 'No' }}</span></span>
                                        <span class="mb-2 text-xs">Phone number: <span
                                                class="text-dark font-weight-bold ms-2">{{ $bookModel->phone_number }}</span></span>
                                        <span class="mb-2 text-xs">Email Address: <span
                                                class="text-dark ms-2 font-weight-bold">{{ $bookModel->email }}</span></span>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-12 ms-auto">
                            <h6 class="mb-3 mt-4">Note:</h6>
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <h6 class="mb-0">{{ $bookModel->note }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

