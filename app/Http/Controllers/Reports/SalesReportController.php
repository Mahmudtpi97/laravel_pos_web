<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function __construct(){

        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Sales';
  }


    public function index(Request $request){
        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']   = $request->get('end_date', date('Y-m-d'));

        $this->data['sales'] = InvoiceItem::select('invoice_items.price','invoice_items.quantity','invoice_items.total','sales_invoices.date','sales_invoices.challan_no','products.title')
                                            ->join('sales_invoices','invoice_items.sales_invoice_id', '=', 'sales_invoices.id')
                                            ->join('products','invoice_items.product_id', '=', 'products.id')
                                            ->whereBetween('sales_invoices.date',[$this->data['start_date'], $this->data['end_date'] ])
                                            ->get();


        return view('reports.sales',$this->data );
    }
}
