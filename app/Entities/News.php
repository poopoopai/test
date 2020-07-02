<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillbable = ['news_category_id', 'title', 'release', 'status', 'content'];

    public function news_category()
    {
    	return $this->belongsTo(NewsCategory::class);
    }
}
