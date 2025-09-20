<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function showloginForm(Request $request){
        if($request->secret && $request->secret == \hash('whirlpool', 'secret')){
            return view('admin.login');
        }else{
            return abort(404);
        }
    }
    public function login(AdminRequest $request){
        $passAndEmail = $request->only(['email','password']);
        $date = new DateTime('now', new DateTimeZone('Asia/Tehran'));

        if (Auth::guard('admins')->attempt($passAndEmail)){
            $request->session()->regenerate();
            $admin = Auth::guard('admins')->user();
            $admin->update([
                'last_login_at' => $date->format('Y-m-d H:i:s'),
                'ip' => $request->ip(),
            ]);
            session(['admin' => $admin]);
            toastr()->success('ورود موفق');
            return redirect()->route('admin.index');
        }else{
            toastr()->error('ورود ناموفق');
            return redirect()->back();
        }
    }
}
