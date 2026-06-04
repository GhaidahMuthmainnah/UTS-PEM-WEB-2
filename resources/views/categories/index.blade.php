@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Kategori</h4>

        <a href="{{ route('categories.create') }}"
            class="btn btn-success">Tambah Kategori</a>
    </div>

    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        {{-- Search --}}
        <form action="{{ route('categories.index') }}"
            method="GET"
            class="mb-3">

            <div class="input-group">

                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari Kategori..."
                    value="{{ request('search') }}">

                <button class="btn btn-success"
                    type="submit">Cari</button>

            </div>
        </form>

        {{-- Tabel --}}
        <table class="table table-bordered table-striped">

            <thead class="table-info">

                <tr class="text-center">
                    <th width="5%">No</th>
                    <th width="20%">Nama Kategori</th>
                    <th width="15%">Kode Kategori</th>
                    <th>Deskripsi</th>
                    <th width="12%">Jumlah Produk</th>
                    <th width="25%">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>

                    <td class="text-center">{{ $loop->iteration + ($categories->firstItem() - 1) }}</td>
                    <td>{{ $category->nama_kategori }}</td>
                    <td class="text-center">{{ $category->kode_kategori }}</td>
                    <td>{{ $category->deskripsi }}</td>
                    <td class="text-center">{{ $category->products_count ?? 0 }}</td>

                    </td>
                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center">

                        Data tidak ditemukan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{-- Pagination --}}
        <div class="mt-3">

            {{ $categories->links() }}

        </div>

    </div>

</div>

@endsection