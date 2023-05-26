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
                                        <h5 class="mb-0">User: {{ $prescriptionModel->user->name }} </h5>
                                        <a href="{{ route('group.create') }}" class="btn btn-primary ">
                                            <span>Create new</span>
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="dataTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Medicine</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Shift</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount of each time</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="text-align:left">Total Price:</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
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
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'medicine_id',
                        name: 'medicine_id'
                    },
                    {
                        data: 'shift_id',
                        name: 'shift_id'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'amount_of_time',
                        name: 'amount_of_time'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    

                ];
                renderTable("{!! route('prescriptiondetail.index',$prescriptionModel) !!}", columns,$totalprice =1);
            </script>
        @endpush
