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

        return Product::where('name', 'like', '%'.$name.'%')->with(['productCategory' => function ($query) use ($type){
            $query->where('type', 'like', '%'.$type.'%');
        }])->get();
    }
}
