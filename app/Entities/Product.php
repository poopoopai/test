<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillbable = ['product_category_id', 'name', 'image', 'description', 'status'];

    public function productCategory()
    {
    	return $this->belongsTo(ProductCategory::class);
    }
}
