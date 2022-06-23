<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Product;

class KategoriController extends Controller
{
    //
    public function index(){
        return view('kategoris',[
            'title' => 'Produk Kategori',
            'kategoris' =>Kategori::all()
        ]);
    }

    public function show(Kategori $kategori){

        // $product = $kategori->products;

        $product = Product::with(['kategori'])->latest()->where('kategori_id','=',$kategori->id)->paginate(3);

        return view('products',[
            'title' => "$kategori->nama Products",
            'products' => $product
        ]);
    }


}
