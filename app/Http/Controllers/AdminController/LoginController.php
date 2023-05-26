<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\LoginRequest\LoginRequest;
use App\Models\AdminModel\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        if(Auth::check()){
            return view('admin.homepage');
        }
        return view('admin.layout.login');
    }

    public function processLogin(LoginRequest $request) 
    {
        $check = Auth::attempt($request->only(['email','password']),$request->remember);
        if($check){
            return redirect()->route('homepage.index')->with('success' , 'Login successfully');
        }
        else{
            return redirect()->route('admin.login')
            ->with(['error' => 'Tài khoản mật khẩu không chính xác']);
        }
       
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoginModel $loginModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoginModel $loginModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoginModel $loginModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoginModel $loginModel)
    {
        //
    }
}
