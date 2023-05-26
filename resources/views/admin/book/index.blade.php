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
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between pb-0">
                                        <h5 class="mb-0">{{ $name_page['total'] }}</h5>
                                        <a href="{{ route('book.create') }}" class="btn btn-primary ">
                                            <span>Create new</span>
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="dataTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date appointment</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time start</th>
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
                        data: 'book_id',
                        name: 'book_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'date_appointment',
                        name: 'date_appointment'
                    },
                    {
                        data: 'shift_id',
                        name: 'shift_id'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ];
                renderTable("{!! route('book.index') !!}", columns);
            </script>
        @endpush
