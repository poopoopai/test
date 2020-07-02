<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['type'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
