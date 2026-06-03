<x-layout>

    <h3>Data Kategori</h3>

    <form>
        <input type="text"
            name="search"
            class="form-control mb-3"
            placeholder="Cari kategori">
    </form>

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode</th>
        </tr>

        @foreach($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->nama_kategori }}</td>
            <td>{{ $category->kode_kategori }}</td>
        </tr>
        @endforeach

    </table>

    {{ $categories->links() }}

</x-layout>