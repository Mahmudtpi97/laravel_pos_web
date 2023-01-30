<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseInvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','price','quantity','total','purchase_invoice_id'];

    public function purchaseInvoice(){
        return $this->belongsTo(PurchaseInvoice::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }


}
