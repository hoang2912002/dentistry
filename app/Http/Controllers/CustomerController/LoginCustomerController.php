<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest\LoginRequest\SignUpRequest;
use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\GroupUserModel;
use Illuminate\Http\Request;
use App\Models\AdminModel\LoginModel;
use App\Models\AdminModel\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class LoginCustomerController extends Controller
{
    public function login()
    {
        return view('customer.login.signin');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function processLogin(Request $request)
    {
        
        $check = Auth::attempt($request->only(['email','password']),$request->rememberMe);
        if($check){
            return redirect()->route('.index')->with('success' , 'Đăng nhập thành công');
        }
        else{
            return redirect()->route('login.login')
            ->with(['error' => 'Tài khoản mật khẩu không chính xác']);
        }
    }

    public function signup()
    {
        return view('customer.login.signup');
    }

    public function processSignUp(SignUpRequest $request)
    {
        try {
            $login = LoginModel::create($request->only('email','password','phone_number','activated'));
            if(!empty($login)){
                $request->merge([
                    'login_id' => $login->id,
                    'uuid' => (string)Str::uuid()
                ]);
                $array_user = [
                    'uuid' => (string)Str::uuid(),
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'birthdate' => $request->birthdate,
                    'login_id' => $login->id,
                ];
                $user = UserModel::create($array_user);
                if(!empty($user)){
                    $group = GroupModel::where('slug',$request->group)->value('id');
                    $role = GroupUserModel::create([
                        'user_uuid' => $user->uuid,
                        'group_id' => $group
                    ]);
                    if(!empty($role)){
                        $check = Auth::loginUsingId($login->id);
                        if($check){
                            return redirect()->route('.index')->with('success' , 'Đăng ký thành công');
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
