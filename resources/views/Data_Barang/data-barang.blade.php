@extends('main')
@section('title', 'Laravel - Data Penjualan Toko')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-6" align='center'>Data Barang</h1>
            <hr class="my-2">
            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-1 my-3">Tambah Data Barang</a>     
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Type Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataBarang as $brg)
                    <tr>
                        <td>{{ $brg['id'] }}</td>
                        <td>{{ $brg['jenis'] }}</td>
                        <td>{{ $brg['type'] }}</td>
                        <td>{{ $brg['jumlah'] }}</td>
                        <td>
                            <form action="{{ route('barang.destroy',$brg['id']) }}" method="POST">
                            <a href="{{ route('barang.show',$brg['id']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('barang.edit',$brg['id']) }}" class="badge badge-primary">Edit</a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="3"> Tidak ada Data</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function action(){  
            var jenis = document.getElementById('jenis').value;
            window.location = "{{ url('barang') }}/"+jenis;
        }
    </script>
@endsection