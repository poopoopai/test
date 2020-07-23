<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Entities\Product;

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
        $id = 1;
        $products = Product::where('id', $id)->with('productCategory')->first();

           

        foreach ($products->image as $key => $product) {

            $fileType = explode('.', $product)[1];
            $originFile = explode('/', $product)[1];
            $company = "iphone";
            
            
            // dd(123);
            if (Storage::disk('public')->exists("$product")) { //check storage have image
                rename(storage_path("app\public\images\\$originFile"), storage_path("app\public\images\\$company$key.$fileType")); //chance image name 

                $newImageLoction =  array_push($newImageLoction, "images\\$company$key.$fileType");
            }
            
        }
        // Product::save($products);

        

       
        return Product::whereHas('productCategory', function ($q) use ($type) {
            $q->where('type', 'like', "%$type%");
        })->where('name', 'like', "%$name%")->with('productCategory')->get();

        // return Product::with('productCategory')->get()->filter(function ($q) use ($type) {
        //     $q->productCategory->type ==
        // });
     
    }

    public function CustomImageName(){
        
        
    }
}
