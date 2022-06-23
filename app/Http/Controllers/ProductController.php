<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index(){


      

        // $products =Product::with(['kategori'])->latest()->get();

        return view('products',[
            "title" => "Products",
            "products" => Product::latest()->filter(request(['search']))->paginate(3)->withQueryString()
         ]); 

    }

    public function other(){

        $products =Product::with(['kategori'])->latest()->where('kategori_id','!=','1')->where('kategori_id','!=','2')->where('kategori_id','!=','3')->paginate(3);

        return view('products',[
            "title" => "Other Products",
            "products" => $products
            // "products" => Product::with(['example'])->latest()->get()
         ]); 

    }

    public function show(Product $product){
        return view('product',[
            "title" => "Product",
            // "product" =>Product::find($slug)
            "product" =>$product,
            "varian" => $product->varian,
            "links" => $product->link
        ]);
    }

}
