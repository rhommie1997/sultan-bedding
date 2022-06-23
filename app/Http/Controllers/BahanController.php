<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    public function index(){
        return view('bahans',[
            'title' => 'Produk Bahan',
            'bahans' =>Bahan::all()
        ]);
    }

    public function detail(Bahan $bahan){
        return view('products',[
            'title' => "Product berbahan $bahan->nama Tipe $bahan->type",
            'products' => $bahan->products
        ]);
    }

}
