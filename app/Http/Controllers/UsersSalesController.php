<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\InvoiceItem;
use App\Models\SalesInvoice;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Support\Facades\Session;

class UsersSalesController extends Controller
{

    public function __construct()
	{
        parent::__construct();
		$this->data['tab_menu'] = 'Sales';
	}

    public function index( $id )
    {
    	$this->data['users'] 	 = User::findOrFail($id);
    	return view('users.sales.sales', $this->data);
    }

    public function createInvoice(InvoiceRequest $request,$user_id )
    {
        $formData = $request->all();
        $formData['user_id'] = $user_id;

        $invoice = SalesInvoice::create($formData);
        return redirect()->route('user.sales.invoice.show',['id'=>$user_id, 'invoice_id'=>$invoice->id])->withMessage('Sales Invoice Create Successfully!');
    }

    public function show($user_id, $invoice_id )
    {
        $this->data['users']    =User::findOrFail($user_id);
        $this->data['invoice']  =SalesInvoice::findOrFail($invoice_id);
        $this->data['products'] =Product::arrayForProductSelect();

        // $this->data['products'] =Product::where('has_stock',1)->get();

        return view('users.sales.invoiceItem',$this->data);
    }




    public function destroy( $user_id, $invoice_id )
    {
        if (SalesInvoice::destroy($invoice_id)) {
           Session::flash('message', 'Sales Invoice Delete Successfully!');
        }
        return redirect()->route('user.sales',['id'=>$user_id]);
    }



    // Invoice Item
    public function createInvoiceItem(Request $request, $user_id, $invoice_id )
    {
        $request->validate([
            'product_id'  => 'required|numeric',
            'price'       => 'required|numeric',
            'quantity'    => 'required|numeric',
            'total'       => 'required|numeric',
        ]);
        $formData                       = $request->all();
        $formData ['sales_invoice_id']   = $invoice_id;

        if (InvoiceItem::create($formData)) {
            Session::flash('message', 'Invoice Item Create Successfully!');
        }
        return redirect()->route('user.sales.invoice.show',['id'=>$user_id, 'invoice_id'=> $invoice_id]);
    }

    public function destroyItem( $user_id, $invoice_id, $item_id)
    {
        if (InvoiceItem::destroy($item_id) ) {
           Session::flash('message', 'Invoice  Item Delete Successfully!');
        }
        return redirect()->route('user.sales.invoice.show', ['id'=>$user_id,'invoice_id'=> $invoice_id] );
    }

}
