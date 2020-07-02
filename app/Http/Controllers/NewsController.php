<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\NewsCategory;

class NewsController extends Controller
{
    public function index(request $request){

        $type = $request->query('type');
        $title = $request->query('title');

        return NewsCategory::where('type', 'like', '%'.$type.'%')->with(['news' => function ($query) use ($title){
            $query->where('title', 'like', '%'.$title.'%');
        }])->get();
    }
}
