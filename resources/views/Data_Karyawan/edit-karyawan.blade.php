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
                    <h2>Edit Karyawan</h2>
                </div>
                <div class="card-body">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($dataKaryawan)
                    <form action="{{ route('karyawan.update', $dataKaryawan['id']) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                      
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama:</strong>
                                    <input type="text" value="{{ $dataKaryawan['nama'] }}" name="nama" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Alamat:</strong>
                                    <input type="text" value="{{ $dataKaryawan['alamat'] }}" class="form-control" name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Jabatan:</strong>
                                    <input type="text" value="{{ $dataKaryawan['jabatan'] }}" class="form-control" name="jabatan" placeholder="Jabatan">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>No Hp:</strong>
                                    <input type="text" value="{{ $dataKaryawan['no_hp'] }}" class="form-control" name="no_hp" placeholder="no_hp">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>
</html>