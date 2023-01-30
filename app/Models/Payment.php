<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id','user_id','date','amount','note','purchase_invoice_id'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function purchaseInvoice(){
        return $this->belongsTo(PurchaseInvoice::class);
    }
}
