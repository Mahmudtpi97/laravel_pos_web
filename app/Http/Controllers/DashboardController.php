<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Models\purchaseInvoiceItem;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu']    = 'Dashboard';
    }


    public function index()
    {
    	$this->data['totalUsers'] 		= User::count('id');
    	$this->data['totalProducts'] 	= Product::count('id');
    	$this->data['totalSales'] 		= InvoiceItem::sum('total');
    	$this->data['totalPurchases'] 	= purchaseInvoiceItem::sum('total');
    	$this->data['totalReceipts'] 	= Receipt::sum('amount');
    	$this->data['totalPayments'] 	= Payment::sum('amount');
    	$this->data['totalStock'] 		= purchaseInvoiceItem::sum('quantity') - InvoiceItem::sum('quantity');

    	return view('dashboard', $this->data);
    }
}
