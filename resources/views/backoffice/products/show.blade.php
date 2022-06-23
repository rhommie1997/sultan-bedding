@extends('backoffice.layouts.main')

@section('container')
<div class="col-md-9 mt-4 col-lg-9 px-md-4">

    <article>
        <h2>{{ $product->nama }}</h2>

        @if($product->foto)
          <div style=" max-height: 450px; overflow:hidden;">
            <img src="{{ asset('storage/'.$product->foto) }}" style="width: 800px" alt="">
          </div>
        @else
          <img src="/foto/empty-bed.png" style="width: 400px" alt=""><br><br>
        @endif
        <br><br>
        <a href="/backoffice/products" class="text-decoration-none btn btn-success"><span data-feather="arrow-left"></span>Back to Products</a>
        <a href="/backoffice/products/{{ $product->slug }}/edit" class="text-decoration-none btn btn-warning"><span data-feather="edit"></span>Edit</a>
        <form action="/backoffice/products/{{ $product->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="text-decoration-none btn btn-danger" onclick="return confirm('Are u sure ??')"><span data-feather="x-circle"></span>Delete</button>
        </form>
        
        <br><br>
        <h4>Varian</h4> 
        <div class="table-responsive col-lg-12">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Need Bedcover ?</th>
                  <th scope="col">Harga</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($varian as $harga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $harga->nama }}</td>
                        <td>{{ $harga->description }}</td>
                        <td>{{ $harga->isBedcover == 0 ? "No Bedcover" : "With Bedcover" }}</td>
                        <td>{{ $harga->harga }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <br><br>
          <h4>Links</h4> 
          <div class="table-responsive col-lg-12">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Link</th>
                  <th scope="col">Deskripsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $link->nama }}</td>
                        <td>{{ $link->type }}</td>
                        <td>{{ $link->link }}</td>
                        <td>{{ $link->description }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        <br>

        
        <br>

         {!! $product->description !!} 

        
    </article>
    <br>
</div>
@endsection