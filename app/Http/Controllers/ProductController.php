<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $product = Product::with('category');

        if ($search) {
            $product->where('nama_produk', 'like', '%' . $search . '%');
        }
        if ($category) {
            $product->where('category_id', $category);
        }
        return view('products.index', [
            'title' => 'Product',
            'products' => $product
                ->latest()->paginate(5)->withQueryString(),

            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'title' => 'Tambah Product',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_produk' => 'required',
            'supplier' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'supplier' => $request->supplier,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        return redirect()->route('products.index')->with('warning', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', [
            'title' => 'Detail Produk',
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_produk' => 'required',
            'supplier' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'supplier' => $request->supplier,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('warning', 'Data produk berhasil dihapus');
    }
}
