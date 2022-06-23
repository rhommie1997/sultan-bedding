{{-- @dd($products) --}}


@extends('layouts.main')

@section('container')
<div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Semua halaman kategori</h1>
    </div>

    @foreach ($kategoris as $kategori)
    
    <ul>
        <li>
            <h4>
                Name : <a href="/kategori/{{ $kategori->slug }}">{{ $kategori->nama }}</a>
            </h4>
        </li>
    </ul>
      
    @endforeach

   
  </div> 
@endsection
