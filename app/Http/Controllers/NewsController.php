<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\News;
use Storage;

class NewsController extends Controller
{
    public function index(request $request)
    {

        $type = $request->query('type');
        $title = $request->query('title');

        return News::whereHas('newsCategory', function ($q) use ($type) {
            $q->where('type', 'like', "%$type%");
        })->where('title', 'like', "%$title%")->with('newsCategory')->get();
    }

    public function test()
    {
       
        
    //  return response()->json(Storage::disk('public')->put('file.txt', "TETSE222TSEContents"));
    //    return Storage::disk('public')->url("images/")->has('test.txt');

       
    }
}
