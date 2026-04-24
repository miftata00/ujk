{{-- resources/views/product/index.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-3">Data Produk</h3>

    <a href="{{ url('/product/create') }}" class="btn btn-primary mb-3">
        Tambah Produk
    </a>

    <table class="table table-bordered">

        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($products as $no => $row)
        <tr>
            <td>{{ $no + 1 }}</td>

            <td>
                @if($row->foto)
                    <img src="{{ asset('uploads/'.$row->foto) }}" width="80">
                @else
                    -
                @endif
            </td>

            <td>{{ $row->nama_produk }}</td>
            <td>Rp {{ number_format($row->harga) }}</td>
            <td>{{ $row->stok }}</td>

            <td>
                <a href="{{ url('/product/'.$row->id.'/edit') }}" 
                   class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ url('/product/'.$row->id) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>

</div>

@endsection