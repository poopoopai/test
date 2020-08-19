<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Entities\Product;
use App\Enums\TestEnum;
use Illuminate\Support\Facades\App;
use App\Jobs\Test;

class ProductController extends Controller
{
    protected $newImageLoction = [];


    public function index(request $request)
    {
        $type = $request->query('type');
        $name = $request->query('name');
        $datas = Product::where('id', 1)->get();
        // foreach ($datas as $data) {
        //     $changeName = "company.jpg";
        //     $fileName = $data->image[0];
        //     $fixFileName = explode('/', $fileName);
        //     $newFileName = $fixFileName[0].'/'.$changeName;
        //     return $newFileName;
        // }
        $id = 3;

        // $filter = function ($q) {
        //     return $q['name'] = "rename";
        // };
        // Product::whereIn($test, [1, 2])->get()->map($filter);
         
        // dd(__('admin.online', [], app()->getlocale()));
        $id = 13;
      
        $products = Product::where('id', $id)->with('productCategory')->first();
        // dd($products);
        foreach ($products->image as $key => $product) {
         
            $fileType = explode('.', $product);
            $lastFileType = $fileType[count($fileType) - 1];
            $originFile = explode('/', $product);
            $lastOrigin = $originFile[count($originFile) - 1];

            $company = "iphone3";
           dd($lastOrigin, $originFile);
            if (Storage::disk('public')->exists($product)) { //check storage have image
                dd(storage_path("app\public\images\\$lastOrigin"), storage_path("app\public\images\\$company$key.$lastFileType"));
                rename(storage_path("app\public\images\\$lastOrigin"), storage_path("app\public\images\\$company$key.$lastFileType")); //chance image name 
                
                
                $products->image = [
                   "images\\$company$key.$lastFileType",
                ];
                $products->save();
                // array_push($products->image[], "images\\$company$key.$lastFileType");
                // dd(2222, $products->image);
            }
            
          
        }
        // Product::save($products);

        // dd(123);
        dd($products);
        $products = Product::where('id', $id)->with('productCategory')->first();
       
        

       
        return Product::whereHas('productCategory', function ($q) use ($type) {
            $q->where('type', 'like', "%$type%");
        })->where('name', 'like', "%$name%")->with('productCategory')->get();

        // return Product::with('productCategory')->get()->filter(function ($q) use ($type) {
        //     $q->productCategory->type ==
        // });
     
    }

    public function test(){
        
        Test::dispatch(Request()->test);
    }
}
