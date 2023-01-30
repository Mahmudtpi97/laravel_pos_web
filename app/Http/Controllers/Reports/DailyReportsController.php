<?php

namespace App\Http\Controllers\Reports;

use App\Models\Payment;
use App\Models\Receipt;
use App\Models\InvoiceItem;
use App\Models\purchaseInvoiceItem;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DailyReportsController extends Controller
{
    public function __construct(){
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu']  = 'DailyReports';
    }

    public function index(Request $request){
        $this->data['products'] = Product::where('has_stock',1)->get();

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d') );
        $this->data['end_date']   = $request->get('end_date', date('Y-m-d') );


         $this->data['sales'] = InvoiceItem::select('products.title', DB::raw( 'SUM(invoice_items.quantity) as quantity, AVG(invoice_items.price) AS price, SUM(invoice_items.total) as total') )
                                ->join('products','invoice_items.product_id', '=', 'products.id')
                                ->join('sales_invoices','invoice_items.sales_invoice_id', '=', 'sales_invoices.id')
                                ->whereBetween('sales_invoices.date', [$this->data['start_date'], $this->data['end_date'] ] )
                                ->where('products.has_stock', 1)
                                ->groupBy('products.title')
                                ->get();

         $this->data['purchases'] = purchaseInvoiceItem::select('products.title', DB::raw('SUM(purchase_invoice_items.quantity) as quantity, AVG(purchase_invoice_items.price) as price, SUM(purchase_invoice_items.total) as total') )
                                ->join('products','purchase_invoice_items.product_id', '=', 'products.id')
                                ->join('purchase_invoices','purchase_invoice_items.purchase_invoice_id', '=', 'purchase_invoices.id')
                                ->whereBetween('purchase_invoices.date', [$this->data['start_date'], $this->data['end_date'] ] )
                                ->where('products.has_stock', 1)
                                ->groupBy('products.title')
                                ->get();

        $this->data['payments'] = Payment::select('users.name','users.phone',DB::raw('SUM(payments.amount) as amount') )
                                ->join('users','payments.user_id', '=', 'users.id')
                                ->whereBetween('date', [$this->data['start_date'], $this->data['end_date'] ] )
                                ->groupBy('users.name','users.phone')
                                ->get();

        $this->data['receipts'] = Receipt::select('users.name','users.phone', DB::raw('SUM(receipts.amount) as amount'))
                                ->join('users','receipts.user_id', '=', 'users.id')
                                ->whereBetween('date', [$this->data['start_date'], $this->data['end_date'] ] )
                                ->groupBy('users.name','users.phone')
                                ->get();


        return view('reports/dailyReports',$this->data);
    }


}
