<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierApiController extends Controller
{
    public function read(Request $request, $id = NULL){
        if(!is_null($id)){
            $category = Category::whereRaw('LOWER(name) = "'.str_replace('-', ' ', $id).'"')->first();
            $data = Suplier::where('category', $category->id)->with(['item', 'category'])->get();
        }else{
            $data = Suplier::with(['item', 'category'])->get();
        }

        // $body = json_decode($request->getContent(), true);
        // var_dump($body);

        if(is_null($data)){
            return $this->response(NULL, ['title' => 'Not Found', 'message' => 'Data not found in the table'], 404);
        }else{
            return $this->response(['suplier' => $data], NULL, 200);
        }
    }
}
