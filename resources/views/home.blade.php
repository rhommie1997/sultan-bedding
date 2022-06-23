@extends('layouts.main')


@section('container')
    
  <div class="slider">
    
    <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
      

      <div id="carouselExampleFade" class="carousel slide carousel-fade carouselExampleFade"  data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="foto/vanitas.jpg" class="d-block " alt="...">
          </div>
          <div class="carousel-item">
            <img src="foto/killua.jpg" class="d-block " alt="...">
          </div>
          <div class="carousel-item">
            <img src="foto/jeanne-eating.gif" class="d-block " alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div> 
    
  </div>

  <div class="contents">
    
    <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 myTitle">Products</h1>
      </div>

      <div class="container ms-3">
        <div class="row">

          @foreach($products as $product)
          <div class="col-md-4">
            <a href="/products/{{ $product->slug }}">
              <div class="card text-white mb-4 image-card">
                @if($product->foto)
                <img src="{{ asset('storage/'.$product->foto) }}" class="card-img image-card" alt="{{ $product->nama }}">
                @else
                  <img src="/foto/empty-bed.png" class="card-img image-card" alt="{{ $product->nama }}">
                @endif
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-3 text-dark hovercard" style="background-color: #E5E0F2;">{{ $product->nama }}</h5>
                </div>
              </div>
            </a>
          </div>
          @endforeach
          <div class="d-flex justify-content-end">
            {{ $products->links() }}
          </div>
          
       
        </div>
      </div>
    </div> 

    <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 myTitle">Product with key "Sprei"</h1>
      </div>

      <div class="container ms-3">
        <div class="row">
        @foreach ($sprei  as $product)
        <div class="col-md-4">
          <a href="/products/{{ $product->slug }}">
            <div class="card text-white mb-4 image-card">
              @if($product->foto)
                <img src="{{ asset('storage/'.$product->foto) }}" class="card-img image-card" alt="{{ $product->nama }}">
              @else
                <img src="/foto/empty-bed.png" class="card-img image-card" alt="{{ $product->nama }}">
              @endif
              
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-3 text-dark hovercard" style="background-color: #E5E0F2;">{{ $product->nama }}</h5>
              </div>
            </div>
          </a>
        </div>
        @endforeach
        </div>
      </div>
    </div> 

  </div>


@endsection

    
    
