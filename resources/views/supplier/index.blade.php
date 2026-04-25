@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Data Supplier</h2>

    <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">
        Tambah Supplier
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $no => $item)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $item->nama_supplier }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->telepon }}</td>
                <td>
                    <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('supplier.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus data?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection