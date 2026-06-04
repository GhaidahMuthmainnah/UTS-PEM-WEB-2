@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Produk</h4>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Kategori</label>
                <select name="category_id"
                    class="form-select">

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}> {{ $category->nama_kategori }}

                    </option>
                    @endforeach
                </select>


            </div>

            <div class="mb-3">
                <label class="form-label">
                    Nama Produk
                </label>

                <input type="text"
                    name="nama_produk"
                    class="form-control"
                    value="{{ old('nama_produk', $product->nama_produk) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Harga
                </label>

                <input type="number"
                    name="harga"
                    class="form-control"
                    value="{{ old('harga', $product->harga) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Stok
                </label>

                <input type="number"
                    name="stok"
                    class="form-control"
                    value="{{ old('stok', $product->stok) }}">
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>

        </form>

    </div>

</div>

@endsection