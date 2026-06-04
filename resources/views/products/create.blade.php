@extends('layouts.app')

@section('content')

<div class="">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-5">Tambah Produk</h4>
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

        <form action="{{ route('products.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">Kategori</label>

                <select name="category_id" class="form-select">

                    <option value="">Pilih Kategori</option>

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}">

            </div>

            <div class="mb-3">

                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">

            </div>

            <div class="mb-3">

                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">

            </div>

            <button type="submit" class="btn btn-whtee">Simpan</button>
            <a href="{{ route('products.index') }}" class="btn btn-white">Kembali</a>

        </form>

    </div>

</div>

@endsection