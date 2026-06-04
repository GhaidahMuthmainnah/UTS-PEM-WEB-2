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
                ->latest()->paginate(10)->withQueryString(),

            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $department) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $department)
    {
        //
    }
}
