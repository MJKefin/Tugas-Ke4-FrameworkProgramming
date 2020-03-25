<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Karyawan</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h2>Daftar Karyawan</h2>
                </div>
                <div class="card-body">
                    
                        <form action="{{route('data.index')}}" class="row mb-4">
                            
                            <div class="col-md-2">
                                <a href="{{ route('data.create') }}" class="btn btn-dark float-right">Tambah</a>
                            </div>
                        </form>

                    @if ($message = Session::get('message'))
                        <div class="alert alert-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @endif
                    
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th width="30%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataKry as $dkry)
                            <tr>
                                <td>{{ $dkry['id'] }} </td>
                                <td>{{ $dkry['nama'] }} </td>
                                <td>{{ $dkry['alamat'] }} </td>
                                <td>{{ $dkry['jabatan'] }} </td>
                                <td>
                                    <form action="{{ route('data.destroy',$dkry['id']) }}" method="POST">
                                        <a href="{{ route('data.show',$dkry['id']) }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ route('data.edit',$dkry['id']) }}" class="btn btn-secondary">Edit</a>
                                        
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
 
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
        </div>
    </div>
   
</body>
</html>