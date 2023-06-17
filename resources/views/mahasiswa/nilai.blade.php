@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="float-left my-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $mahasiswa->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>: {{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>: {{ $mahasiswa->kelas->nama_kelas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
               <table class="table table-striped">
                    <thead>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                    </thead>
                    <tbody>
                    @forelse ( $mahasiswa->mahasiswaMatakuliah as $item )
                        <tr>
                            <td>{{ $item->matakuliah->nama_matkul }}</td>
                            <td>{{ $item->matakuliah->sks }}</td>
                            <td>{{ $item->matakuliah->semester }}</td>
                            <td>{{ $item->nilai }}</td>
                        </tr>
                    @empty

                    @endforelse
                 </tbody>
               </table>
               <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
            </div>

        </div>
    @endsection
