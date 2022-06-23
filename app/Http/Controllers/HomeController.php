<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){


        $products = Product::with(['kategori'])->latest()->paginate(6);
        $productsKeyword_1 = Product::with(['kategori'])->latest()->where('nama', 'LIKE', '%Sprei%')->get();

        return view('home',[
            "title" => "home",
            "products" => $products,
            "sprei" => $productsKeyword_1
            // "products" => Product::with(['example'])->latest()->get()
         ]); 

    }
}
