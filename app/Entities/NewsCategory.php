<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = ['type'];

    public function news()
    {
    	return $this->hasMany(News::class);
    }
}
