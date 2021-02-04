<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $valid = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if($valid){
            $user = User::Where('username', $request->email)->orWhere('email', $request->email)->first();
            if(!is_null($user)){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) || Auth::attempt(['username' => $request->email, 'password' => $request->password])){
                    if($request->remember == 'on'){
                        Auth::login($user, true);
                    }else{
                        Auth::login($user);
                    }
                    return redirect(Auth::user()->role.'/accountpayable')->with('message', ['type' => 'success', 'title' => 'Selamat datang', 'body' => 'Hallo, '.Auth::user()->firstname.' '.Auth::user()->lastname]);
                }else{
                    return redirect()->back()->with('message', ['type' => 'error', 'title' => 'Account invalid', 'body' => 'please enter correct account credentials']);
                }
            }else{
                return redirect()->back()->with('message', ['type' => 'error', 'title' => 'Account Not Found', 'body' => 'please enter correct registered account credentials']);
            }
        }else{
            return view('auth.login');
        }
    }
}
