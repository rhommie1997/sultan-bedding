{{-- @dd($products) --}}


@extends('layouts.main')

@section('container')
<div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Semua halaman bahan</h1>
    </div>

    @foreach ($bahans as $bahan)
    
    <ul>
        <li>
            <h4>
                Name : <a href="/bahan/{{ $bahan->slug }}">{{ $bahan->nama }} Tipe {{ $bahan->type }}</a>
            </h4>
        </li>
    </ul>
      
    @endforeach

   
  </div> 
@endsection
