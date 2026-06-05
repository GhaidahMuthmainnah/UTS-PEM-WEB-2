@extends('layouts.app')

@section('content')

<div class="">
    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-5">Trash Product</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-danger">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Supplier</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($products as $product)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->supplier ?? '-' }}</td>
                    <td>{{ $product->category->nama_kategori }}</td>
                    <td>Rp {{ number_format($product->harga,0,',','.') }} </td>
                    <td>{{ $product->stok }}</td>
                    <td>
                        <form action="{{ route('products.restore', $product->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin Ingin Mengembalikan Data?')">Restore</button>

                        </form>
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">Tidak ada data di trash</td>
                </tr>


                @endforelse

            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>
        </div>

        <div class="mt-3">

            {{ $products->links() }}

        </div>

    </div>

</div>

@endsection