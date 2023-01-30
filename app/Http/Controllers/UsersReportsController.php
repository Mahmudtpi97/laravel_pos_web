<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Receipt;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\purchaseInvoiceItem;

class UsersReportsController extends Controller
{
    public function index($id){
        $this->data['tab_menu'] ='Reports';

        $this->data['users']= User::findOrFail($id);

        $this->data['sales'] = InvoiceItem::select('products.title',DB::raw('SUM(invoice_items.price) as price, SUM(invoice_items.quantity) as quantity,SUM(invoice_items.total) as total') )
                            ->join('products','invoice_items.product_id', '=', 'products.id')
                            ->join('sales_invoices','invoice_items.sales_invoice_id', '=', 'sales_invoices.id')
                            ->where('sales_invoices.user_id', $id)
                            ->where('products.has_stock', 1)
                            ->groupBy(['products.id','products.title'])
                            ->get();

        $this->data['purchases'] = purchaseInvoiceItem::select('products.title',DB::raw('SUM(purchase_invoice_items.price) as price, SUM(purchase_invoice_items.quantity) as quantity,SUM(purchase_invoice_items.total) as total') )
                            ->join('products','purchase_invoice_items.product_id', '=', 'products.id')
                            ->join('purchase_invoices','purchase_invoice_items.purchase_invoice_id', '=', 'purchase_invoices.id')
                            ->where('purchase_invoices.user_id', $id)
                            ->where('products.has_stock', 1)
                            ->groupBy(['products.id','products.title'])
                            ->get();

        $this->data['payments'] = Payment::select('payments.date',DB::raw('SUM(payments.amount) as amount') )
                            ->where('payments.user_id', $id)
                            ->groupBy('payments.date')
                            ->get();

        $this->data['receipts'] = Receipt::select('date',DB::raw('SUM(amount) as amount') )
                            ->where('user_id', $id)
                            ->groupBy('date')
                            ->get();


        return view('users.reports.reports', $this->data);

    }
}
