<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCategories extends Model
{
    use HasFactory;

    protected $table        = 'products_categories';
    protected $fillable = ['title'];


    public function products(){
        return $this->hasMany(Products::class);
    }

    public static function listOfCategories(){

        $arr = [];
        $categories = ProductsCategories::all();
        foreach ($categories as $category) {
            $arr[$category->id] = $category->title;
        }
        return $arr;

    }

}
