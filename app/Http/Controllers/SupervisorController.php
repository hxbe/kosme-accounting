<?php

namespace App\Http\Controllers;

use App\Models\AccountPayable;
use App\Models\Category;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Suplier;
use App\Models\Termin;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function company(){
        $data = Company::get();
        return view('supervisor.company',['data' => $data]);
    }

    public function category(){
        $data = Category::get();
        return view('supervisor.category',['data' => $data]);
    }

    public function list($company = NULL, $category = NULL){
        if(!is_null($company) && !is_null($category)){
            $data['company'] = Company::where('abbr', $company)->first();
            $data['category'] = Category::whereRaw('LOWER(name) = "'.str_replace('-',' ', $category).'"')->first();
            $data['ap'] = AccountPayable::where(['company' => $data['company']->id, 'category' => $data['category']->id, 'visible' => 1])->with(['purchase', 'invoice', 'category', 'suplier', 'company'])->get();
            return view('supervisor.aplist',['data' => $data]);
        }
    }

    public function detail($company = NULL, $category = NULL, $id = NULL){
        if(!is_null($company) && !is_null($category && !is_null($id))){
            $data['company'] = Company::where('abbr', $company)->first();
            $data['category'] = Category::whereRaw('LOWER(name) = "'.str_replace('-',' ', $category).'"')->first();
            $data['ap'] = AccountPayable::where(['company' => $data['company']->id, 'category' => $data['category']->id, 'visible' => 1, 'id' => $id])->with(['purchase', 'invoice', 'category', 'suplier', 'company'])->get();
            return view('supervisor.apdetail',['data' => $data]);
        }
    }

    public function tes(){
        // $data = Invoice::with('termin')->get();
        $data = AccountPayable::with(['purchase', 'invoice', 'category', 'suplier', 'company'])->get();
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";

        // foreach ($data->purchase as $row) {
        // }
        echo json_encode($data);
    }
}
