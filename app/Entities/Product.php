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

    public function getimageAttribute($value)
    {
       return json_decode($value, true);
    }

    public function setimageAttribute($value)
    {
       if (is_array($value)){
           $this->attributes['image'] = json_encode($value);
       }
    }
}
