<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    protected $fillable   = ['challan_no','date','note','user_id','admin_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function items(){
        return $this->hasMany(purchaseInvoiceItem::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }

}
