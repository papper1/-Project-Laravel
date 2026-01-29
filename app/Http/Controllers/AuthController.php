<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  
    public function SignIn()
    {
        return view('auth.signin');
    }

    public function CheckSignIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $repass   = $request->repass;
        $mssv     = $request->mssv;
        $lop      = $request->lopmonhoc;
        $gioitinh = $request->gioitinh;

        if (
            $username == 'ThangNQ' &&
            $password == '123abc' &&
            $repass == '123abc' &&
            $mssv == '0123567' &&
            $lop == '67PM2' &&
            $gioitinh == 'nam'
        ) {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
    }
}
