@extends('layouts.app')

@section('content')

<div class="">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-5">Detail Kategori</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th width="25%">Nama Kategori</th>
                <td>{{ $category->nama_kategori }}</td>
            </tr>

            <tr>
                <th>Kode Kategori</th>
                <td>{{ $category->kode_kategori }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $category->deskripsi }}</td>
            </tr>
        </table>

        <hr>
        <h5>Daftar Produk</h5>

        <table class="table table-bordered">
            <thead class="table-info text-center">
                <tr>
                    <th width="10%">No</th>
                    <th>Nama Produk</th>
                </tr>
            </thead>

            <tbody>
                @forelse($category->products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->nama_produk }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="2" class="text-center">Belum ada produk</td>
                </tr>
                @endforelse
            </tbody>

        </table>
        <a href="{{ route('categories.index') }}" class="btn btn-info">Kembali</a>

    </div>

</div>

@endsection