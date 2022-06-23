{{-- @dd($products) --}}


@extends('layouts.main')

@section('container')
<div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Product berbahan {{ $bahan }}</h1>
    </div>

    @foreach ($products as $product)
    <article class="mb-5">
      <h4>
        Name : <a href="/products/{{ $product->slug }}">{{ $product->nama }}</a>
      </h4>
      {{-- {!! $product->description  !!} --}}
    </article>
      
    @endforeach

   
  </div> 
@endsection
