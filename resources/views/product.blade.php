@extends('layouts.main')

@section('container')


    

    <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Detail {{ $title }}</h1>
        </div>



        <article>
            <h2>{{ $product->nama }}</h2>
            @if($product->foto)
            <div style=" max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/'.$product->foto) }}" style="width: 800px" alt="">
            </div>
            @else
                <img src="/foto/empty-bed.png" style="width: 400px" alt="">
            @endif
            <p>Included By 
                {{ $product->user->name }}
                , Tipe 
                <a href="/kategori/{{ $product->kategori->slug }}" class="text-decoration-none">
                    {{ $product->kategori->nama }}
                </a>
                , Bahan <a href="/bahan/{{ $product->bahan->slug }}" class="text-decoration-none">{{ $product->bahan->nama }} Tipe {{ $product->bahan->type }}</a>
            </p>
            Varian : 
            @foreach ($varian as $harga)
                <div class="">
                    {{ $loop->iteration }}. {{ $harga->nama  }}  , harga : {{ $harga->harga }}
                    @if($product->kategori->nama == "Seprei" or $product->kategori->nama == "Seprei & Bedcover")
                    , {{ $harga->isBedcover == 0 ? "No Bedcover" : "With Bedcover" }}
                    @endif
                </div>
            @endforeach
            <br>

            <div class="d-flex flex-row mb-3">
            @foreach ($links as $link)
                @if($link->type == "Tokopedia")
                <div class="p-2">
                    <a class="btn btn-success" href="{{ $link->link }}">
                        {{ $link->nama }}
                    </a>
                </div>
                @else
                <div class="p-2">
                    <a class="btn btn-orange" href="{{ $link->link }}">
                        {{ $link->nama }}
                    </a>
                </div>
                @endif
            @endforeach
            </div>
            <br>

             {!! $product->description !!} 

            
        </article>
        <br>
        <a href="/products" class="text-decoration-none">Back to Products</a>
    </div>

    

    
@endsection