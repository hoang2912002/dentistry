@extends('customer.layout.login')
@section('content')
    <div class="card mt-8">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-info shadow-success border-radius-lg py-3 pe-1 text-center py-4">
                <h4 class="font-weight-bolder text-white mt-1">Đăng ký</h4>
                <p class="mb-1 text-sm text-white">Điền đầy đủ thông tin cá nhân để đăng ký</p>
            </div>
        </div>
        <div class="card-body">
            <form role="form" class="text-start" method="POST" action="{{ route('login.processSignUp') }}">
                @csrf
                @method('POST')
                <div class="input-group input-group-static mb-4">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="name">
                </div>
                <div class="input-group input-group-static mb-4">
                    <label>Số điện thoại</label>
                    <input type="number" class="form-control" placeholder="0987654321" name="phone_number">
                </div>
                <div class="input-group input-group-static mb-4 d-flex align-items-center">
                    <label>Giới tính</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="1">
                        <label class="custom-control-label" for="gender">Nam</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="0">
                        <label class="custom-control-label" for="gender">Nữ</label>
                    </div>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="birthdate">
                </div>
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
                <input type="hidden" name="activated" value="1">
                <input type="hidden" name="group" id="" value="user">
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