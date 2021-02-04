<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountPayable;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Termin;
use Illuminate\Http\Request;

class AccountPayableApiController extends Controller
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

    public function create(Request $request){
        $data = NULL;
        if($request->has('purchase')){
            $data['purchase'] = $request->purchase;
            $purchase = new Purchase();
            $purchase->no = $request->purchase['no'];
            $purchase->total = $request->purchase['total'];
            $purchase->save();
        }
        if($request->has('purchase_item')){
            $data['purchase_item'] = $request->purchase_item;
            foreach ($data['purchase_item'] as $row) {
                $purchase_item = new PurchaseItem();
                $purchase_item->quantity = $row['quantity'];
                $purchase_item->subtotal = $row['subtotal'];
                $purchase_item->tax = $row['tax'];
                $purchase_item->price = $row['item'];
                $purchase_item->item = $row['item'];
                $purchase_item->purchase = $row['purchase'];
                $purchase_item->timestamps = false;
                $purchase_item->save();
            }
        }
        if($request->has('invoice')){
            $data['invoice'] = $request->invoice;
            $invoice = new Invoice();
            $invoice->no = $request->invoice['no'];
            $invoice->date = $request->invoice['date'];
            $invoice->due = $request->invoice['due'];
            $invoice->purchase = $request->invoice['purchase'];
            $invoice->timestamps = false;
            $invoice->save();
        }

        if($request->has('ap')){
            $accountpayable = new AccountPayable();
            $accountpayable->type = $request->ap['type'];
            $accountpayable->payment_status = $request->ap['payment_status'];
            $accountpayable->visible = $request->ap['visible'];
            $accountpayable->invoice = $request->ap['invoice'];
            $accountpayable->purchase = $request->ap['purchase'];
            $accountpayable->suplier = $request->ap['suplier'];
            $accountpayable->category = $request->ap['category'];
            $accountpayable->company = $request->ap['company'];
            $accountpayable->save();
        }

        if($request->has('termin')){
            $data['termin'] = $request->termin;
            $data_termin = [];
            if(is_array($data['termin'])){
                $i = 0;
                foreach ($data['termin'] as $row) {
                    $termin = new Termin();
                    $termin->name = $row['name'];
                    $termin->value = $row['value'];
                    $termin->start = $row['start'];
                    $termin->end = $row['end'];
                    $termin->status = $row['status'];
                    $termin->keterangan = $row['keterangan'];
                    $termin->invoice = $row['invoice'];
                    $termin->timestamps = false;
                    $termin->save();
                    $data_termin[$i] = $termin->id;
                    $i++;
                }
            }else{
                $termin = new Termin();
                $termin->name = $request->termin['name'];
                $termin->value = $request->termin['value'];
                $termin->start = $request->termin['start'];
                $termin->end = $request->termin['end'];
                $termin->status = $request->termin['status'];
                $termin->keterangan = $request->termin['keterangan'];
                $termin->invoice = $request->termin['invoice'];
                $termin->timestamps = false;
                $termin->save();
                $data_termin[0] = $termin->id;
            }
        }
        
        if($request->has('payment')){
            $data['payment'] = $request->payment;
            if(is_array($data['payment'])){
                $i = 0;
                foreach ($data['payment'] as $row) {
                    $payment = new Payment();
                    $payment->type = $row['type'];
                    $payment->date = $row['date'];
                    $payment->value = $row['value'];
                    if($row['bankaccount'] == '-'){
                        $payment->bank = NULL;
                    }else{
                        $payment->bank = $row['bankaccount'];
                    }
                    $payment->accountpayable = $accountpayable->id;
                    $payment->termin = $data_termin[$i];
                    $payment->timestamps = false;
                    $payment->save();
                    $i++;
                }
            }else{
                $payment = new Payment();
                $payment->type = $request->payment['type'];
                $payment->date = $request->payment['date'];
                $payment->value = $request->payment['value'];
                if($request->payment['bank'] == '-'){
                    $payment->bank = NULL;
                }else{
                    $payment->bank = $request->payment['bank'];
                }
                $payment->accountpayable = $accountpayable->id;
                $payment->termin = $data_termin[0];
                $payment->timestamps = false;
                $payment->save();
            }
        }

        // Deliver
        return $this->response(['insert' => $data], NULL, 200);
    }
}
