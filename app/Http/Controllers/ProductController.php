<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Product;

class ProductController extends Controller
{
    public function index(request $request)
    {

        $type = $request->query('type');
        $name = $request->query('name');

        return Product::whereHas('ProductCategory', function($q) use ($type) {
                $q->where('type', 'like', "%$type%");
        })->where('name', 'like', "%$name%")->with('ProductCategory')->get();
     
    }
}
