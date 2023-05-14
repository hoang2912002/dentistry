@extends('admin.layout.main')
@include('admin.layout.table')
@push('css')
    <style>
        .table td, .table th {
                padding: 12px 30px 12px 24px;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                font-size: 15px;
                
            }
            .page-item.active .page-link {
                color: white !important;
                
            }
            
    </style>
@endpush
@section('content')
    
    <div class="row mt-4">
        <div class="col-12">
            {{-- <div class="card">

                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Danh sách sinh viên</h5>

                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                            <tr id="title">
                                <th>Uuid</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div> --}}
            {{-- <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">Datatable Simple</h5>
                    <p class="text-sm mb-0">
                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Uuid</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birthdate</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div> --}}
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between pb-0">
                                        <h5 class="mb-0">User</h5>
                                        <a href="{{ route('user.create') }}" class="btn btn-primary ">
                                            <span>Create new</span>
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="dataTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Uuid</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birthdate</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
    
        @endsection
        @push('js')
            <script>
                var columns = [{
                        data: 'user_uuid',
                        name: 'user_uuid'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'birthdate',
                        name: 'birthdate'
                    },
                    {
                        data: 'login_id',
                        name: 'login_id'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ];
                renderTable("{!! route('user.index') !!}", columns);
            </script>
        @endpush
