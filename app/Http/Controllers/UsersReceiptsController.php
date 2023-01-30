<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersReceiptsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['tab_menu'] ='Receipts';
    }
    public function index($id){
        $this->data['users']   =User::findOrFail($id);
        return view('users.receipts.receipts',$this->data);
    }

    public function store (Request $request, $user_id, $invoice_id = null){
            $request->validate([
                'date' => 'required',
                'amount' => 'required|numeric',
            ]);
            $formData = $request->all();
            $formData['user_id'] =$user_id;
            $formData['admin_id'] =Auth::id();

            if ($invoice_id) {
                $formData['sales_invoice_id'] =$invoice_id;
            }

            if (Receipt::create($formData)) {
                Session::flash('message', 'Receipts Added Successfully');
            }
            if ($invoice_id) {
                return redirect()->route('user.sales.invoice.show', ['id'=>$user_id,'invoice_id'=>$invoice_id] );
            }
            else{
                return redirect()->route('user.receipts', ['id' => $user_id]);
            }
    }


    public function destroy($user_id, $receipt_id){

        if (Receipt::destroy($receipt_id)) {
            Session::flash('message', 'Receipts Deleted Successfully');
        }
        return redirect()->route('user.receipts', ['id' => $user_id]);
    }
}
