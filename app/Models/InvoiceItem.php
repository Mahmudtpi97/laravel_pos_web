<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','price','quantity','total','sales_invoice_id'];

    public function invoice()
    {
    	return $this->belongsTo(SalesInvoice::class, 'sales_invoice_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }


}
