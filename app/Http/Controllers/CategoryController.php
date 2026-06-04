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
            'categories' => $category->paginate(10)->withQueryString(),
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

        return redirect()->route('categories.index')->with('success', 'Kategiro Anda Berhasil Ditambahkan');
    }
}
