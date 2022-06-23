@extends('backoffice.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Product Kategori</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}  
    </div>
  @endif

  <div class="table-responsive col-lg-8">
    <a href="/backoffice/kategori/create" class="btn btn-outline-secondary mb-3">New Kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                {{-- <a href="/backoffice/kategori/{{ $kategori->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                <a href="/backoffice/kategori/{{ $kategori->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/backoffice/kategori/{{ $kategori->slug }}" method="post" class="d-inline">
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