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

    // public function __construct(){

    // }

    public function response($data, $message, $code){
        if(!is_null($data)){
            $response['data'] = $data;
        }

        if(!is_null($message)){
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }

    // public function mail($data = NULL){
    //     if(!is_null($data)){
    //         Mail::to($data['to'])->send(new Email($data));
    //     }
    // }
}
