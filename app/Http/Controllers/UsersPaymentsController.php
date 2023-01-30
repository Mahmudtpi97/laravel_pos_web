<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersPaymentsController extends Controller
{

  public function __construct(){
    parent::__construct();
    $this->data['tab_menu'] ='Payments';
}

    public function index($id){
        $this->data['users'] = User::findOrFail($id);
        return view('users.payments.payment',$this->data);
    }



    public function store(Request $request, $user_id, $invoice_id = null){
        $request->validate([
            'date' => 'required',
            'amount' => 'required'
        ]);
        $formData             = $request->all();
        $formData['admin_id'] = Auth::id();
        $formData['user_id']  = $user_id;


        if ($invoice_id) {
            $formData['purchase_invoice_id'] = $invoice_id;
        }

        if (Payment::create($formData)) {
            Session::flash('message', 'Payment Added Successfully');
        }

        if ($invoice_id) {
            return redirect()->route('user.purchases.invoice.invoiceShow', ['id' =>$user_id, 'invoice_id' =>$invoice_id ] );
        }
        else{
            return redirect()->route('user.payments', ['id' => $user_id]);
        }
    }

    public function destroy($user_id, $payment_id){
        if (Payment::destroy($payment_id)) {
            Session::flash('message', 'Payment Deleted Successfully');
        }
        return redirect()->route('user.payments',['id'=>$user_id]);
    }
}

