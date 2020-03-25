@extends('main')

@section('title', 'Laravel - SI penjualan online')

@section('content')
    <div class="container">
        <div class="jumbotron">

            @php
                $jabatan = ['Manager', 'Staff', "SEMUA"];
            @endphp


            @if ($msg = Session::get('msg'))
                <div class="alert alert-success">
                    <span>{{ $msg }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>   
                </div>
            @endif 

            <h1 class="display-6" align='center'>Data Karyawan</h1>
            <hr class="my-2">     

            <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-1 my-3">Tambah Karyawan</a>
            <form action="{{route('karyawan.index')}}" class="row mb-4">
                    <div class="col-md-8">
                        <select name="jabatan" class="form-control">
                            <option value="" disabled selected>Pilih jabatan</option>
                            @foreach ($jabatan as $jbt)
                            <option value="{{ $jbt == "SEMUA" ? "" : $jbt }}" >{{ $jbt }} </option>
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
                    <th scope="col">Jabatan</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                    
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKaryawan as $kry)
                    <tr>
                        <td>{{ $kry['id'] }}</td>
                        <td>{{ $kry['nama'] }}</td>
                        <td>{{ $kry['alamat'] }}</td>
                        <td>{{ $kry['jabatan'] }}</td>
                        <td>{{ $kry['no_hp'] }}</td>

                        <td>
                            <form action="{{ route('karyawan.destroy',$kry['id']) }}" method="POST">
                            <a href="{{ route('karyawan.show',$kry['id']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('karyawan.edit',$kry['id']) }}" class="badge badge-primary">Edit</a>
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
            var jabatan = document.getElementById('jabatan').value;
            window.location.href = "{{ url('karyawan') }}/"+jabatan;
        }
    </script>
@endsection