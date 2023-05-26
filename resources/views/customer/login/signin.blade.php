@extends('customer.layout.login')
@section('content')
    <div class="card mt-8">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-success border-radius-lg py-3 pe-1 text-center py-4">
                <h4 class="font-weight-bolder text-white mt-1">Đăng nhập</h4>
                <p class="mb-1 text-sm text-white">Nhập tài khoản và mật khẩu để đăng nhập</p>
            </div>
        </div>
        <div class="card-body">
            <form role="form" class="text-start" method="POST" action="{{ route('login.processLogin') }}">
                @csrf
                @method('POST')
                <div class="input-group input-group-static mb-4">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="nguyenvana@email.com" name="email">
                </div>
                <div class="input-group input-group-static mb-4">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="•••••••••••••" name="password">
                </div>
                <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked name="rememberMe">
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Ghi nhớ</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 mt-3 mb-0">Đăng nhập</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
                Không có tài khoản?
                <a href="{{ route('login.signup') }}" class="text-info text-gradient font-weight-bold">Đăng ký</a>
            </p>
        </div>
    </div>
@endsection