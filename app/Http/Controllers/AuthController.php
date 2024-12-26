<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function login(LoginRequest $request){

        if (Auth::guard('user')->attempt(['phone'=>$request->phone,'password' => $request->password])) {
            if(!auth('user')->user()->active){
                toast('مرحبا بك ايها المندوب برجاء تفيير كلمة السر','warning');
                return redirect()->route('changePasswordPage');
            }
            toast('مرحبا بك ايها المندوب','success');
            return redirect()->route('home_user');
        }

        if (Auth::guard('owner')->attempt(['phone'=>$request->phone,'password' => $request->password])) {
            toast('مرحبا بك ايها المالك','success');
            return redirect()->route('home');
        }

        toast('هذه البيانات غير صحيحة','error');
        return redirect()->route('home');
    }

    public function logout(){
        Auth::guard('user')->logout();
        Auth::guard('owner')->logout();
        toast('تم تسجيل الخروج بنجاح','success');
        return redirect()->route('login');
    }


    public function changePasswordPage(){
        return view('change_password');
    }

    public function changePassword(Request $request){

        $user = Auth::guard('user')->user();
        $user->password = bcrypt($request->password);
        $user->active = true;
        $user->save();
        toast('تم تغيير كلمة السر بنجاح','success');
        return redirect()->route('home_user');
    }
}
