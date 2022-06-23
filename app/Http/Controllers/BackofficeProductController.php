<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use App\Models\Bahan;
use App\Models\Harga;
use App\Models\Link;

//Storage Foto
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input as InputInput;

class BackofficeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // return Product::where('user_id',auth()->user()->id)->get();
        

        return view('backoffice.products.index',[
            'products' => Product::all()
                  
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backoffice.products.create',[
            'kategoris' => Kategori::all(),
            'bahans' => Bahan::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // return $request->file('foto')->store('product-image');

        $validData = $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:products',
            'kategori_id' => 'required',
            'foto' => 'image|file|max:4096',
            'bahan_id' => 'required',
            'description' => 'required'
        ]);

        if($request->file('foto')){
            $validData['foto'] = $request->file('foto')->store('product-images');
        }

        //Images

        // $totalVarian = $request->totalVarian;

        // for($i = 1;$i<= $totalVarian; $i++){
        //     $validVarian = $request->validate([
        //         'varianName_'.$i => 'required'
        //     ]);
        // }

        $validData["user_id"] = auth()->user()->id;
        Product::create($validData);

       
        //Initial dynamic insert
        $newProduct = Product::where('nama','=',$request->nama)->where('slug','=',$request->slug)->where('description','=',$request->description)->where('kategori_id','=',$request->kategori_id)->where('bahan_id','=',$request->bahan_id)->get();
        $newId = $newProduct[0]->id;

        //Varian Harga
        $totalVarian = $request->totalVarian;

        $varian = $request->all();
        for($i = 1; $i<=$totalVarian; $i++){
            
            $varian["product_id"] = $newId;
            $varian["nama"] = $varian["varianName_".$i];
            $varian["description"] = $varian["varianDescription_".$i];
            $varian["isBedcover"] = $varian["varianIsBedcover_".$i];
            $varian["harga"] = $varian["varianHarga_".$i];

            Harga::create($varian);
        }

        //Varian Link
        $totalLink = $request->totalLink;
        for($i = 1; $i<=$totalLink; $i++){
            $varian["product_id"] = $newId;
            $varian["nama"] = $varian["linkName_".$i];
            $varian["type"] = $varian["linkType_".$i];
            $varian["link"] = $varian["linkURL_".$i];
            $varian["description"] = $varian["linkDescription_".$i];

            Link::create($varian);
        }

        return redirect("/backoffice/products")->with('success','New Product Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('backoffice.products.show',[
            'product' => $product ,
            "varian" => $product->varian,
            "links" => $product->link
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('backoffice.products.edit',[
            'product' => $product,
            'kategoris' => Kategori::all(),
            'bahans' => Bahan::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

        $rules = [
            'nama' => 'required',
            'kategori_id' => 'required',
            'bahan_id' => 'required',
            'description' => 'required',
            'foto' => 'image|file|max:4096'
        ];

        if($request->slug != $product->slug){
            $rules['slug'] = 'required|unique:products';
        }

        

        $validData = $request->validate($rules);

        //Edit Foto
        if($request->file('foto')){
            if($request->fotolama){
                Storage::delete($request->fotolama);
            }
            $validData['foto'] = $request->file('foto')->store('product-images');
        }

 
        $validData["user_id"] = auth()->user()->id;


        Product::where('id',$product->id)->update($validData);

        //Get Product ID
        $product_id = $product->id;

        //Varian
        
        $totalVarian = $request->totalVarian;
        if($totalVarian == $product->varian->count()){
            for($i = 1; $i<=$totalVarian; $i++){

                $varian = $request->validate([]);
                $varian["nama"] = $request->get('varianName_'.$i);
                $varian["product_id"] = $product->id;
                $varian["harga"] = $request->get('varianHarga_'.$i);
                $varian["isBedcover"] = $request->get('varianIsBedcover_'.$i);
                $varian["description"] = $request->get('varianDescription_'.$i);
          
                Harga::where('id',$product->varian[$i-1]->id)->update($varian);

            }
        }else{
            Harga::where('product_id','=',$product->id)->delete();
            for($i = 1; $i<=$totalVarian; $i++){

                $varian["product_id"] = $product_id;
                $varian["nama"] = $request["varianName_".$i];
                $varian["description"] = $request["varianDescription_".$i];
                $varian["isBedcover"] = $request["varianIsBedcover_".$i];
                $varian["harga"] = $request["varianHarga_".$i];

                Harga::create($varian);
            }
        }

        //Link

        $totalLink = $request->totalLink;
        
        
        if($totalLink == $product->link->count()){
            for($i = 1; $i<=$totalLink; $i++){

                $link["nama"] = $request->get('linkName_'.$i);
                $link["product_id"] = $product->id;
                $link["type"] = $request->get('linkType_'.$i);
                $link["link"] = $request->get('linkURL_'.$i);
                $link["description"] = $request->get('linkDescription_'.$i);
               
                Link::where('id',$product->link[$i-1]->id)->update($link);
                
            }
        }else{
            Link::where('product_id','=',$product->id)->delete();

            for($i = 1; $i<=$totalLink; $i++){

                $link["nama"] = $request->get('linkName_'.$i);
                $link["product_id"] = $product->id;
                $link["type"] = $request->get('linkType_'.$i);
                $link["link"] = $request->get('linkURL_'.$i);
                $link["description"] = $request->get('linkDescription_'.$i);

                Link::create($link);
            }
        }

        


        return redirect("/backoffice/products")->with('success','Product Updated !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //

        if($product->foto){
            Storage::delete($product->foto);
        }

        Product::destroy($product->id);
        Harga::where('product_id','=',$product->id)->delete();
        Link::where('product_id','=',$product->id)->delete();

       

        return redirect("/backoffice/products")->with('success','Current Product has been Deleted !!');

    }
}
