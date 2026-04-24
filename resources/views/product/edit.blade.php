{{-- resources/views/product/edit.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="container col-md-6">

    <h3 class="mb-4">Edit Produk</h3>

    <form action="{{ url('/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk"
                value="{{ old('nama_produk', $product->nama_produk) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga"
                value="{{ old('harga', $product->harga) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok"
                value="{{ old('stok', $product->stok) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">

            <br>

            @if($product->foto)
                <img src="{{ asset('uploads/'.$product->foto) }}" width="100">
            @endif
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ url('/product') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection