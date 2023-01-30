<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = ['cat_id','title','description','cost_price','price','p_image','has_stock'];


 public function categories(){
    return $this->belongsTo(ProductsCategories::class,'cat_id','id');
 }

 public function purchasesItems(){
    return $this->hasMany(purchaseInvoiceItem::class);
}
 public function salesItems(){
    return $this->hasMany(InvoiceItem::class);
}



//  Product Select Array
public static function arrayForProductSelect(){

    $arr=[];
    $products =Product::all();
    foreach($products as $product){
        $arr[$product->id] = $product->title;
    }
    return $arr;
}



}
