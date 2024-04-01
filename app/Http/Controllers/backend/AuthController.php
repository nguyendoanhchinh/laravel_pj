<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function index(){
        if(Auth::id()>0){
            return redirect()->route('dashboard.index');
        }
        return view('backend.auth.login');
    }
//    public  function  login(Request $request){  //chưa custom validate
//        $validated = $request->validate([
//            'email' => 'required|email',
//            'password' => 'required|min:3',
//        ]);
//    }
    //người dùng phải thông qua request mới đến được aucontroller nếu đúng đăng nhập thành công
    public function login(AuthRequest $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:3'],
        ]);
        if (Auth::attempt($credentials)) {
           return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công');
        }
            return  redirect()->route('auth.admin')->with('error','Thông tin tài khoản đăng nhập không chính xác');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.admin');
    }
}
