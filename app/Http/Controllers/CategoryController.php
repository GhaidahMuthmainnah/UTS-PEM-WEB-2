<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {
            $query->where('nama_kategori', 'like', "%$search%");
        })
            ->latest()
            ->paginate(5);

        return view('categories.index', compact('categories'));
    }
}
