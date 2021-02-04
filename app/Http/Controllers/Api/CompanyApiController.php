<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    public function read(Request $request, $abbr = NULL){
        if(!is_null($abbr)){
            $data = Company::where('abbr', $abbr)->first();
        }else{
            $data = Company::get();
        }

        // $body = json_decode($request->getContent(), true);
        // var_dump($body);

        if(is_null($data)){
            return $this->response(NULL, ['title' => 'Not Found', 'message' => 'Data not found in the table'], 404);
        }else{
            return $this->response(['company' => $data], NULL, 200);
        }
    }
}
