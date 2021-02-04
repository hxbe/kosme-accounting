<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankApiController extends Controller
{
    public function read(Request $request, $id = NULL){
        if(!is_null($id)){
            $data = Bank::where('no', $id)->get();
        }else{
            $data = Bank::get();
        }

        // $body = json_decode($request->getContent(), true);
        // var_dump($body);

        if(is_null($data)){
            return $this->response(NULL, ['title' => 'Not Found', 'message' => 'Data not found in the table'], 404);
        }else{
            return $this->response(['bank' => $data], NULL, 200);
        }
    }
}
