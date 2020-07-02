<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\ProductCategory;

class ProductController extends Controller
{
    public function index(request $request){

        $type = $request->query('type');
        $name = $request->query('name');

        return ProductCategory::where('type', 'like', '%'.$type.'%')->with(['products' => function ($query) use ($name){
            $query->where('name', 'like', '%'.$name.'%');
        }])->get();
    }
}
