<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Validator;

class AuthController extends Controller
{
    public function login(Request $req){
        $valid = Validator::make($req->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($valid->fails()){
            // return redirect('/')->with('warning', ['title' => 'Account invalid', 'body' => 'please enter correct account credentials']);
        }else{
            // check if username not exist
            $user = User::Where('username', $req->email)->orWhere('email', $req->email)->first();
            if(!is_null($user)){
                if(Auth::attempt(['email' => $req->email, 'password' => $req->password]) || Auth::attempt(['username' => $req->email, 'password' => $req->password])){
                    Auth::login($user);
                    return redirect('/'.Auth::user()->role.'/account-payable')->with('message', ['type' => 'success', 'title' => 'Selamat Datang', 'body' => 'Selamat datang '.Auth::user()->firstname.' '.Auth::user()->lastname]);
                }else{
                    // return redirect('/')->with('error', ['title' => 'Account invalid', 'body' => 'please enter correct account credentials']);
                }
            }else{
                // return redirect('/')->with('error', ['title' => 'Account invalid', 'body' => 'please enter correct account credentials']);
            }
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/')->with('success', ['title' => 'Registration Success', 'body' => 'please check your email for verification code']);
    }

    public function register(Request $req){
        $token = Str::random(6);
        while(User::where('token', $token)->count() != 0){
            $token = Str::random(6);
        }

        $data = [
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'status' => 'register',
            'role' => 'admin',
            'token' => $token,
        ];

        if(User::create($data)){
            $mail = [
                'type' => 'register',
                'to' => $req->email,
                'subject' => 'Register Verification Code',
                'name' => $req->firstname." ".$req->lastname,
                'username' => $req->username,
                'code' => $token,
                'link' => URL::to('/register-verification/'.$token),
            ];
            $this->mail($mail);
            return redirect('/')->with('success', ['title' => 'Registration Success', 'body' => 'please check your email for verification code']);
        }else{
            // error
        }
    }
}
