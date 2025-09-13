<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\Cart;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;

class LoginController extends Controller
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
//        try {
//            $client = new \SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
//            $user_sms = "reza1386";
//            $pass_sms = "+Yasin1358";
//            $fromNum = "+9810004223";
//            $toNum = $request->phone;
//            $pattern_code = 'wsdibg29jcp7glc';
//            $input_data = ['verification-code' => $code];
//
//            $result = $client->sendPatternSms($fromNum, $toNum, $user_sms, $pass_sms, $pattern_code, $input_data);
//        } catch (\SoapFault $ex){
//            toastr()->warning('خطا در ارسال پیامک');
//        }
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

        addToCartWhenLogin();

        session()->forget('phone');
        return redirect()->route('index');
    }

    public function logout(){
        Auth::logout();
        toastr()->success('شما از حساب خود خارج شدید');
        return redirect()->route('index');
    }
}
