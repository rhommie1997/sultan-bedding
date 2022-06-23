@extends('backoffice.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Products</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-10" role="alert">
      {{ session('success') }}  
    </div>
  @endif

  <div class="table-responsive col-lg-10">
    <a href="/backoffice/products/create" class="btn btn-outline-secondary mb-3">New Product</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Kategori</th>
          <th scope="col">Bahan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->nama }}</td>
            <td>{{ $product->kategori->nama }}</td>
            <td>{{ $product->bahan->nama }}</td>
            <td>
                <a href="/backoffice/products/{{ $product->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/backoffice/products/{{ $product->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/backoffice/products/{{ $product->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are u sure ??')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
@endsection