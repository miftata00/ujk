{{-- resources/views/product/create.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="container col-md-6">

    <h3 class="mb-4">Tambah Produk</h3>

    <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ url('/product') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection