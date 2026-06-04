@extends('layouts.app')

@section('content')

<div class="">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-5">Detail Produk</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered">

            <tr>
                <th width="25%">Kategori</th>
                <td>{{ $product->category->nama_kategori }}</td>
            </tr>

            <tr>
                <th>Nama Produk</th>
                <td>{{ $product->nama_produk }}</td>
            </tr>

            <tr>
                <th>Harga</th>
                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
            </tr>

            <tr>
                <th>Stok</th>
                <td>{{ $product->stok }}</td>
            </tr>

        </table>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>

    </div>

</div>

@endsection