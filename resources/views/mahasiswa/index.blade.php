@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td><img src="{{ asset('storage/' . $mahasiswa->image_mhs) }}" width="100px" height="100px" alt=""></td>
                <td>{{ $mahasiswa->kelas->nama_kelas }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('mahasiswa.show', $mahasiswa) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $mahasiswa) }}">Edit</a>
                    <a type="submit" onclick="event.preventDefault(); document.getElementById('delete-form').submit() " class="btn btn-danger text-white">Delete</a>
                    <a class="btn btn-warning" href="{{ route('mahasiswa.nilai', $mahasiswa) }}">Nilai</a>
                    <form id="delete-form" action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $mahasiswas->links() }}
@endsection
