<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout()
    {
        session()->forget('.config_user');
        return redirect()->back();
    }

    public function signin()
    {
        return view('auth.pages.signin');
    }

    public function signin_post()
    {
        $username = request("username");
        $password = request("password");
        $user = User::where("user_username", $username)->get();
        if (count($user) === 0) return redirect()
            ->back()->with('alert', 'Tài khoản hoặc mật khẩu không chính xác.');

        $user = $user[0];
        if (!Hash::check($password, $user->user_password))
            return redirect()
                ->back()->with('alert', 'Tài khoản hoặc mật khẩu không chính xác.');

        session(['.config_user' => $user]);

        return redirect("be-admin");
    }

    public function signup()
    {
        return view('auth.pages.signup');
    }

    public function signup_post()
    {
        $username = request("username");
        $password = request("password");
        $repassword = request("repassword");

        $getUsers = User::where("user_username", $username)->get();
        if (count($getUsers) > 0)
            return redirect()->back()->with('alert', 'Tên người dùng đã tồn tại.');

        if ($password != $repassword)
            return redirect()->back()->with('alert', 'Mật khẩu nhập lại không khớp.');

        $newUser = new User;
        $newUser->user_username = $username;
        $hashed = Hash::make($password, ['rounds' => 12,]);
        $newUser->user_password = $hashed;
        $newUser->save();

        return redirect("log-in")->with('alert', 'Tạo tài khoản thành công. Vui lòng đăng nhập.');
    }
}
