<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControlle extends Controller
{
    public function index(){
        return view('user.login');
    }
    public function loginRequest(LoginUserRequest $request){
        if (!$request->phone){
            session(['error' => 'لطفا شماره موبایل خود را اول وارد کنید']);
            return redirect('login');
        }
        $code = rand(100000, 999999);
        Otp::create([
            'phone' => $request->phone,
            'code' => $code,
            'expiration_at' => now()->addMinutes(5),
        ]);
        //sms
        session(['phone' => $request->phone]);
        return redirect('verify');
    }
    public function verify(){
        $mobile = session('phone');
        if(!$mobile){
            session(['error' => 'لطفا شماره موبایل خود را اول وارد کنید']);
            return redirect('login');
        }
        return view('user.enter-code', compact('mobile'));
    }
    public function verifyRequest(Request $request){
        $mobile = session('phone');
        if(!$mobile){
            return redirect('login');
        }
        $confirmCode = implode($request->only('code1', 'code2', 'code3', 'code4', 'code5', 'code6'));
        $otp = Otp::where('phone', $mobile)->where('code', $confirmCode)->where('expiration_at', '>', now())->first();
        if(!$otp){
            session(['error' => 'کد تایید اشتباه است یا منقضی شده است']);
            return redirect()->back();
        }
        $otp->update(['used' => True]);
        $user = User::firstorcreate(['phone' => $mobile]);
        Auth::login($user);
        return redirect()->route('index');
    }
}
