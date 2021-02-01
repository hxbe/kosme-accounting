<?php

namespace App\Http\Controllers;

use App\Models\AccountPayable;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Company;
use App\Models\Suplier;
use Illuminate\Http\Request;

class SupervisorController extends Controller{
    public function accountpayable($name = NULL, $category = NULL, $ap = NULL){
        if(!is_null($name)){
            if(!is_null($category)){
                if(!is_null($ap)){
                    $data['company'] = Company::where('abbr', $name)->first();
                    $data['ap'] = AccountPayable::where(['id' => $ap, 'visible' => 1])->with(['invoice', 'purchase', 'suplier', 'payment', 'category'])->get();
                    if(!is_null($data['ap'])){
                        // echo json_encode($data['ap']);
                        return view('Supervisor.detailaccountpayable',['data' => $data]);
                    }else{
                        // error not found
                    }
                }else{
                    $data['company'] = Company::where('abbr', $name)->first();
                    $data['category'] = Category::whereRaw('LOWER(name) = "'.str_replace('-',' ', $category).'"')->first();
                    $data['ap'] = AccountPayable::where(['category' => $data['category']->id, 'visible' => 1])->with(['invoice', 'purchase', 'suplier', 'payment', 'category'])->get();
                    return view('Supervisor.accountpayable',['data' => $data]);
                }
            }else{
                $data['company'] = Company::where('abbr', $name)->first();
                $data['category'] = Category::get();
                return view('Supervisor.category',['data' => $data]);
            }
            // echo json_encode($company);
        }else{
            $data = Company::get();
            return view('Supervisor.company',['data' => $data]);
        }
    }

    public function addaccountpayable(Request $req, $name = NULL, $category = NULL){
        if(!is_null($name) && !is_null($category)){
            if(!is_null($req)){
                $data['company'] = Company::where('abbr', $name)->first();
                $data['category'] = Category::whereRaw('LOWER(name) = "'.str_replace('-',' ', $category).'"')->first();
                $data['ap'] = AccountPayable::where(['category' => $data['category']->id, 'visible' => 1])->with(['invoice', 'purchase', 'suplier', 'payment', 'category'])->get();
                $data['suplier'] = Suplier::get();
                $data['bank_account'] = BankAccount::with('bank')->get();
                return view('Supervisor.addaccountpayable',['data' => $data]);
            }else{
                $data['company'] = Company::where('abbr', $name)->first();
                var_dump($data);
            }
        }else{
            // error
        }
    }
}
