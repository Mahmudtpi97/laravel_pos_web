<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Models\purchaseInvoiceItem;
use App\Http\Controllers\Controller;

class PurchaseReportsController extends Controller
{

 public function __construct(){

        parent::__construct();

        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Purchases';
  }
    public function index(Request $request){
        $this->data['start_date'] = $request->get('start_date',date('Y-m-d'));
        $this->data['end_date']   = $request->get('end_date',date('Y-m-d'));

        $this->data['purchases'] = purchaseInvoiceItem::select('purchase_invoice_items.price', 'purchase_invoice_items.quantity', 'purchase_invoice_items.total','purchase_invoices.challan_no', 'purchase_invoices.note','purchase_invoices.date','products.title')
                                ->join('purchase_invoices','purchase_invoice_items.purchase_invoice_id','=','purchase_invoices.id')
                                ->join('products','purchase_invoice_items.product_id','=','products.id')
                                ->whereBetween('purchase_invoices.date',[$this->data['start_date'],$this->data['end_date']])
                                ->get();

        return view('reports.purchases',$this->data);
     }
}
