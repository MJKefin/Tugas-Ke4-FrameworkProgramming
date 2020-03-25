@extends('main')

@section('title', 'Laravel - SI penjualan online')

@section('content')
    <div class="container">
        <div class="jumbotron">

            @php
                $alamat = ['Tegal', 'Pemalang', 'Pekalongan','Brebes',"SEMUA"];
            @endphp


            @if ($msg = Session::get('msg'))
                <div class="alert alert-success">
                    <span>{{ $msg }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>   
                </div>
            @endif 

            <h1 class="display-6" align='center'>Data Pelanggan</h1>
            <hr class="my-2">     

            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-1 my-3">Tambah Pelanggan</a>
            <form action="{{route('pelanggan.index')}}" class="row mb-4">
                    <div class="col-md-8">
                        <select name="alamat" class="form-control">
                            <option value="" disabled selected>Pilih alamat</option>
                            @foreach ($alamat as $almt)
                            <option value="{{ $almt=="SEMUA" ? "" : $almt }}" >{{ $almt }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success float-right mb-4" value="Cari">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                
                    <th scope="col">Id</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                    
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPelanggan as $plg)
                    <tr>
                        <td>{{ $plg['id'] }}</td>
                        <td>{{ $plg['nama'] }}</td>
                        <td>{{ $plg['alamat'] }}</td>
                        <td>{{ $plg['no_hp'] }}</td>

                        <td>
                            <form action="{{ route('pelanggan.destroy',$plg['id']) }}" method="POST">
                            <a href="{{ route('pelanggan.show',$plg['id']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('pelanggan.edit',$plg['id']) }}" class="badge badge-primary">Edit</a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function action(){
            var alamat = document.getElementById('alamat').value;
            window.location.href = "{{ url('pelanggan') }}/"+alamat
        }
    </script>
@endsection