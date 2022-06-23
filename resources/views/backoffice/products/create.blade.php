@extends('backoffice.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new Product</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/backoffice/products/" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Product Name</label>
          <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama" aria-describedby="nama" name="nama" autofocus value="{{ old('nama') }}">
          @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="Slug" class="form-label">Product Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid  @enderror" id="slug" aria-describedby="slug" name="slug" value="{{ old('slug') }}" >
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Product Kategori</label>
            <select class="form-select" name="kategori_id">
                <option value="1" selected>Select Categories..</option>
                @foreach ($kategoris as $kategori)
                    @if(old('kategori_id') == $kategori->id)
                        <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                    @else
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bahan" class="form-label ">Product Bahan</label>
            <select class="form-select" name="bahan_id">
                <option value="1" selected>Select Categories..</option>
                    @foreach ($bahans as $bahan)
                        @if(old('bahan_id') == $bahan->id)
                            <option value="{{ $bahan->id }}" selected>{{ $bahan->nama }} tipe {{ $bahan->type }}</option>
                        @else
                            <option value="{{ $bahan->id }}">{{ $bahan->nama }} tipe {{ $bahan->type }}</option>
                        @endif
                    @endforeach
            </select>
        </div>

        
        <label  class="form-label">Varian</label>
        <input type="hidden" id="totalVarian" name="totalVarian" value="0">
        <div class="form-multiple-control p-4" id="varianForm">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success w-10" id="varianPlus"><span data-feather="plus" class="align-text-bottom">TEST</span></button>
                    <button type="button" class="btn btn-danger w-10" id="varianMinus"><span data-feather="minus" class="align-text-bottom">TEST</span></button>
                </div>
            </div>
        </div>

        <label  class="form-label">Links</label>
        <input type="hidden" id="totalLink" name="totalLink" value="0">
        <div class="form-multiple-control p-4" id="linkForm">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success w-10" id="linkPlus"><span data-feather="plus" class="align-text-bottom">TEST</span></button>
                    <button type="button" class="btn btn-danger w-10" id="linkMinus"><span data-feather="minus" class="align-text-bottom">TEST</span></button>
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="foto" class="form-label">Product Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="description" type="hidden" name="description" value="{{ old('description') }}">
            <trix-editor input="description"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>



@endsection
