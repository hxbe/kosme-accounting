<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;    
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function read(Request $request, $category = NULL){
        if(!is_null($category)){
            $data = Category::whereRaw('LOWER(name) = "'.str_replace('-',' ', $category).'"')->first();
        }else{
            $data = Category::get();
        }

        // $body = json_decode($request->getContent(), true);
        // var_dump($body);

        if(is_null($data)){
            return $this->response(NULL, ['title' => 'Not Found', 'message' => 'Data not found in the table'], 404);
        }else{
            return $this->response(['category' => $data], NULL, 200);
        }
    }
}
