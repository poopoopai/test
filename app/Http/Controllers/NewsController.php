<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\News;

class NewsController extends Controller
{
    public function index(request $request)
    {

        $type = $request->query('type');
        $title = $request->query('title');

        return News::where('title', 'like', '%'.$title.'%')->with(['NewsCategory' => function ($query) use ($type){
            $query->where('type', 'like', '%'.$type.'%');
        }])->get();
    }
}
