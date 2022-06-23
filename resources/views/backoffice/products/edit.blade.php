@extends('backoffice.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/backoffice/products/{{ $product->slug }}" autocomplete="off" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Product Name</label>
          <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama" aria-describedby="nama" name="nama" autofocus value="{{ old('nama',$product->nama) }}">
          @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="Slug" class="form-label">Product Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid  @enderror" id="slug" aria-describedby="slug" name="slug" value="{{ old('slug',$product->slug) }}" >
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
                    @if(old('kategori_id',$product->kategori_id) == $kategori->id)
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
                        @if(old('bahan_id',$product->bahan_id) == $bahan->id)
                            <option value="{{ $bahan->id }}" selected>{{ $bahan->nama }} tipe {{ $bahan->type }}</option>
                        @else
                            <option value="{{ $bahan->id }}">{{ $bahan->nama }} tipe {{ $bahan->type }}</option>
                        @endif
                    @endforeach
            </select>
        </div>
        
        <label  class="form-label">Varian</label>
        <input type="hidden" id="totalVarian" name="totalVarian" value={{ $product->varian->count() }}>
        <div class="form-multiple-control p-4" id="varianForm">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success w-10" id="varianPlus"><span data-feather="plus" class="align-text-bottom">TEST</span></button>
                    <button type="button" class="btn btn-danger w-10" id="varianMinus"><span data-feather="minus" class="align-text-bottom">TEST</span></button>
                </div>
            </div>
            @foreach($product->varian as $varian)
                <div class='row' id ='varian_{{ $loop->iteration }}'>
                    <div class='col'>
                        <label class='form-label'>{{ $loop->iteration }}. Varian</label>
                        <input type='text' class='form-control' id='varianName_{{ $loop->iteration }}' name='varianName_{{ $loop->iteration }}' value="{{ old('varianName_'.$loop->iteration,$varian->nama) }}" required >
                    </div>
                    <div class='col'>
                        <label  class='form-label'>Harga</label>
                        <input type='text' class='form-control' id='varianHarga_{{ $loop->iteration }}' name='varianHarga_{{ $loop->iteration }}' value="{{ old('varianHarga_'.$loop->iteration,$varian->harga) }}" required >
                    </div>
                    <div class='col'>
                        <label  class='form-label'>Need Bedcover ?</label>
                        <select class='form-select' name='varianIsBedcover_{{ $loop->iteration }}'>

                            <option value='0' {{ $varian->isBedcover == "0" ? 'selected' : '' }}>No Bedcover</option>
                            <option value='1' {{ $varian->isBedcover == "1" ? 'selected' : '' }}>With Bedcover</option>
                         
                        </select>
                    </div>
                    <div class='col'>
                        <label  class='form-label'>Description</label>
                        <textarea class='form-control' id='varianDescription_{{ $loop->iteration }}' name='varianDescription_{{ $loop->iteration }}' required>{{ $varian->description }}</textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <label  class="form-label">Links</label>
        <input type="hidden" id="totalLink" name="totalLink" value={{ $product->link->count() }}>
        <div class="form-multiple-control p-4" id="linkForm">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-success w-10" id="linkPlus"><span data-feather="plus" class="align-text-bottom">TEST</span></button>
                    <button type="button" class="btn btn-danger w-10" id="linkMinus"><span data-feather="minus" class="align-text-bottom">TEST</span></button>
                </div>
            </div>
            @foreach($product->link as $link)
                <div class="row" id="link_{{ $loop->iteration }}">
                    <div class="col">
                        <label class="form-label">{{ $loop->iteration }}. Link</label><input type="text" class="form-control" id="linkName_{{ $loop->iteration }}" name="linkName_{{ $loop->iteration }}" value="{{ old('linkName_'.$loop->iteration,$link->nama) }}" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Link Type</label><select class="form-select" name="linkType_{{ $loop->iteration }}">
                            <option value="Tokopedia" {{ $link->type == "Tokopedia" ? 'selected' : '' }}>Tokopedia</option>
                            <option value="Shopee" {{ $link->type == "Shopee" ? 'selected' : '' }}>Shopee</option></select>
                    </div>
                    <div class="col">
                        <label class="form-label"> Link URL</label>
                        <textarea class="form-control" id="linkURL_{{ $loop->iteration }}" name="linkURL_{{ $loop->iteration }}" required>{{ $link->link }}</textarea>
                    </div>
                    <div class="col">
                        <label class="form-label">Link Description</label>
                        <textarea class="form-control" id="linkDescription_{{ $loop->iteration }}" name="linkDescription_{{ $loop->iteration }}" required>{{ $link->description }}</textarea>
                    </div>
                </div>
            @endforeach
        </div>
        

        <div class="mb-3">
            <label for="foto" class="form-label">Product Image</label>
            <input type="hidden" id="fotolama" name="fotolama" value="{{ $product->foto }}">
            @if($product->foto)
                <img src="{{ asset('storage/'.$product->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            
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
            <input id="description" type="hidden" name="description" value="{{ old('description',$product->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>



@endsection
