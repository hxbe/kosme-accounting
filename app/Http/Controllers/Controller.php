<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

    }

    public function mail($data = NULL){
        if(!is_null($data)){
            Mail::to($data['to'])->send(new Email($data));
        }
    }

    // public function validate_session(){
    //     if(session()->has('user')){
    //         if(request()->segment(1) != session('user')->role){
    //             return redirect('/'.session('user')->role);
    //         }else{
    //             return redirect('/')->with('warning', ['title' => 'Account Deactivate', 'body' => 'please contact administrator']);
    //         }
    //     }else{
    //         if(request()->segment(1) != ''){
    //             return redirect('/')->with('success', ['title' => 'Account Deactivate', 'body' => 'please contact administrator']);
    //         }
    //     }
    // }

    // public function validate_account($data = NULL){
    //     if(!is_null($data)){
    //         switch ($data['status']) {
    //             case 'active':
    //                 session()->regenerate();
    //                 session()->put('user', $data);
    //                 return redirect('/'.$data['role'])->with('success', ['title' => 'Welcome Back', 'body' => 'Hello '.$data['firstname'].' '.$data['lastname']]);
    //             break;

    //             case 'deactivated':
    //                 return redirect('/')->with('warning', ['title' => 'Account Deactivate', 'body' => 'please contact administrator']);
    //             break;

    //             case 'register':

    //             break;

    //             default:

    //             break;
    //         }
    //     }
    // }

    // public function validate_role($role = NULL){
    //     if(!is_null($role)){

    //     }
    // }
}
