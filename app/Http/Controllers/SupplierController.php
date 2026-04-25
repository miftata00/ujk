<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // ==========================
    // TAMPILKAN DATA SUPPLIER
    // ==========================
    public function index()
    {
        $data = Supplier::all();
        return view('supplier.index', compact('data'));
    }

    // ==========================
    // FORM TAMBAH DATA
    // ==========================
    public function create()
    {
        return view('supplier.create');
    }

    // ==========================
    // SIMPAN DATA BARU
    // ==========================
    public function store(Request $request)
    {
        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'telepon'       => $request->telepon
        ]);

        return redirect()->route('supplier.index')
                         ->with('success', 'Data supplier berhasil ditambahkan');
    }

    // ==========================
    // FORM EDIT DATA
    // ==========================
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    // ==========================
    // UPDATE DATA
    // ==========================
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'telepon'       => $request->telepon
        ]);

        return redirect()->route('supplier.index')
                         ->with('success', 'Data supplier berhasil diupdate');
    }

    // ==========================
    // HAPUS DATA
    // ==========================
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')
                         ->with('success', 'Data supplier berhasil dihapus');
    }
}