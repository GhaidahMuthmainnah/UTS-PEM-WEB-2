@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Kategori</h4>
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

        <form action="{{ route('categories.update', $category->id) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">
                    Nama Kategori
                </label>

                <input type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori', $category->nama_kategori) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Kode Kategori
                </label>

                <input type="text"
                    name="kode_kategori"
                    class="form-control"
                    value="{{ old('kode_kategori', $category->kode_kategori) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="form-control">{{ old('deskripsi', $category->deskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>

</div>

@endsection