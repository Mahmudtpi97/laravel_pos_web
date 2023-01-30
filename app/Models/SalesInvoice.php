<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['challan_no','date','note','user_id','admin_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }
    public function admin() {
    	return $this->belongsTo(Admin::class);
    }

    public function items(){
        return $this->hasMany(InvoiceItem::class);
    }
    public function receipts(){
        return $this->hasMany(Receipt::class);
    }
    public function purchasesItems(){
        return $this->hasMany(purchaseInvoiceItem::class);
    }


}
