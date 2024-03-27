<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  public function getLogin()
  {
    return view('backend.login');
  }
  public function postLogin(Request $request)
  {
    if ($request->remember == 'Remember Me') {
      $remember = true;
    } else {
      $remember = false;
    }
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
      return redirect()->route('admin.home');
    } else {
      return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
    }
  }
}
