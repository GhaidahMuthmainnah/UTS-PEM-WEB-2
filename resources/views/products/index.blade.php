@extends('layouts.app')

@section('content')

<div class="">

    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif

    <div class=" d-flex justify-content-between align-items-center">
        <h4 class="mb-5">Data Produk</h4>
        <a href="{{ route('products.create') }}" class="btn btn-success mb-5">Tambah Produk</a>
    </div>

    <div class="card-body">

        <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-3">

            <div class="col-md-5">
                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari Produk..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>

                        {{ $category->nama_kategori }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-3">
                <button class="btn btn-success">Filter</button>
            </div>

        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-info">

                <tr class="text-center">
                    <th width="5%">No</th>
                    <th width="20%">Nama Produk</th>
                    <th>Supplier</th>
                    <th width="15%">Kategori</th>
                    <th width="15%">Harga</th>
                    <th width="7%">Stok</th>
                    <th>Aksi</th>
                </tr>

            </thead>
            <tbody class="text-center">

                @forelse($products as $product)

                <tr>
                    <td>{{ $loop->iteration + ($products->firstItem() - 1) }}</td>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->supplier ?: '-' }}</td>
                    <td>{{ $product->category->nama_kategori }}</td>
                    <td>Rp {{ number_format($product->harga) }}</td>
                    <td>{{ $product->stok }}</td>
                    <td class="text-center">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Hapus</button>

                        </form>
                    </td>
                </tr>


                @empty

                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>

                @endforelse

            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>

@endsection