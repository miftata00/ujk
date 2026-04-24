<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan semua data produk
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('product.create');
    }

    // Menyimpan data produk
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $foto);
        }

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'foto'        => $foto
        ]);

        return redirect('/product')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    // Update data produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $foto = $product->foto;

        if ($request->hasFile('foto')) {
            $foto = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $foto);
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'foto'        => $foto
        ]);

        return redirect('/product')->with('success', 'Produk berhasil diupdate');
    }

    // Hapus data produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->foto && file_exists(public_path('uploads/'.$product->foto))) {
            unlink(public_path('uploads/'.$product->foto));
        }

        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus');
    }
}