<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\PurchaseInvoice;
use Illuminate\Http\Request;
use App\Models\purchaseInvoiceItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PurchasesInvoiceItemsRequest;

class UsersPurchasesController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['tab_menu'] = 'Purchases';
    }
    // Purchase Page
    public function index($id){
        $this->data['users']    =User::findOrFail($id);
        return view('users.purchases.purchases',$this->data);
    }

// PurchaseInvoice Create
    public function store(Request $request, $user_id){
        $request->validate([
            'challan_no' => 'required',
            'date'       => 'required',
        ]);
        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if (PurchaseInvoice::create($formData)) {
           Session::flash('message','Purchase Create Successfully !');
        }
        return redirect()->route('user.purchases', ['id' =>$user_id ]);
    }

 // PurchaseInvoice Show
   public function invoiceShow($user_id ,$invoice_id){
        $this->data['users']       =User::findOrFail($user_id);
        $this->data['invoice']     =PurchaseInvoice::findOrFail($invoice_id);
        $this->data['products']     =Product::arrayForProductSelect();
        return view('users.purchases.invoiceItem',$this->data);
    }


// PurchaseInvoice Item Create
public function createInvoiceItem(PurchasesInvoiceItemsRequest $request, $user_id, $invoice_id){

    $formData = $request->all();
    $formData ['purchase_invoice_id']= $invoice_id;

    if (purchaseInvoiceItem::create($formData)) {
       Session::flash('message','Invoice Item Create Successfully !');
    }
    return redirect()->route('user.purchases.invoice.invoiceShow', ['id' =>$user_id, 'invoice_id' =>$invoice_id ] );
}

 // PurchaseInvoice Delete
 public function destroy($user_id, $invoice_id){
    if (PurchaseInvoice::destroy($invoice_id)) {
         Session::flash('message','Invoice Delete Successfully !');
    }
    return redirect()->route('user.purchases', ['id' =>$user_id] );
 }

 // PurchaseInvoice Item Delete
 public function destroyItem($user_id, $invoice_id, $item_id){
    if (purchaseInvoiceItem::destroy($item_id)) {
         Session::flash('message','Invoice Item Delete Successfully !');
    }
    return redirect()->route('user.purchases.invoice.invoiceShow', ['id' =>$user_id, 'invoice_id' =>$invoice_id] );
 }


}

