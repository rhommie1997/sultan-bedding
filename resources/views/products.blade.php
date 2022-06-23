{{-- @dd($products) --}}


@extends('layouts.main')

@section('container')
<div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>{{ $title }}</h1>
    </div>


    {{-- <div class="containter">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="https://source.unspash.com/1200x400/?{{ $product->nama }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $product->nama }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="container ms-3">
      <div class="row">
      @foreach ($products as $product)
    
      <div class="card m-2" style="width: 18rem;">
        <div class="position-absolute px-3 py-2 text-black" style="opacity: 0.5; background-color: #E5E0F2;">{{ $product->kategori->nama }}</div>
        @if($product->foto)
          <img src="{{ asset('storage/'.$product->foto) }}" class="card-img-top"  alt="...">
        @else
          <img src="/foto/empty-bed.png" class="card-img-top"  alt="...">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $product->nama }}</h5>
        </div>
        <a class="btn  btn-outline-secondary mb-1" style="width: 30%; margin-top:-20px" href="/products/{{ $product->slug }}">Detail</a>
      </div>
    
      @endforeach
      </div>
    </div>

    <div class="d-flex justify-content-end">
      {{ $products->links() }}
    </div>
    


   
  </div> 
@endsection
