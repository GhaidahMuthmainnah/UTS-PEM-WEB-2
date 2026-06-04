<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = Category::latest();

        if ($search) {
            $category->where('nama_kategori', 'like', '%' . $search . '%');
        }

        return view('categories.index', [
            'title' => 'Category',
            'categories' => $category->paginate(5)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'kode_kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'kode_kategori' => $request->kode_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori Anda Berhasil Ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'title' => 'Edit Category',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'kode_kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori,
            'kode_kategori' => $request->kode_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('categories.index')->with('danger', 'Kategori berhasil diubah');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('danger', 'Kategori berhasil dihapus');
    }

    public function show(Category $category)
    {
        $category->load('products');

        return view('categories.show', [
            'title' => 'Detail Category',
            'category' => $category
        ]);
    }
}
