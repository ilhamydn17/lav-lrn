@extends('layout.main')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your i
                            nput.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswa.update', $mahasiswa) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nim">Nim</label>
                            <input type="text" name="nim" class="form-control" id="Nim"
                                value="{{ $mahasiswa->nim }}">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="Nama"
                                value="{{ $mahasiswa->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Kelas</label>
                            <select class="form-control" name="kelas_id" aria-label="Default select example">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $mahasiswa->kelas->id) selected @endif>{{ $item->nama_kelas }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">No_Handphone</label>
                            <input type="No_Handphone" name="no_handphone" class="form-control" id="No_Handphone"
                                value="{{ $mahasiswa->no_handphone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label> <br>
                            <input type="file" name="update_image"><br><br>
                            <img src="{{ asset('storage/'. $mahasiswa->image_mhs) }}" width="100px" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
