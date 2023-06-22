<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(5);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $validatedData = $request->validated();

        if($request->file('image_mhs')){
            $validatedData['image_mhs'] = $request->file('image_mhs')->storeAs('mahasiswa_images',$request->nim.'.'.$request->file('image_mhs')->extension(), 'public');
        }

        Mahasiswa::create($validatedData);

        return redirect()->route('mahasiswa.index')->with('Success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact(['mahasiswa', 'kelas']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $image_mhs = $mahasiswa->image_mhs;
        $validatedData = $request->validated();
        // dd($mahasiswa->image_mhs);
        if($request->hasFile('update_image') ){
            if(Storage::exists('public/' . $image_mhs) && $image_mhs != null) Storage::delete($image_mhs);
            $validatedData['image_mhs'] = $request->file('update_image')->storeAs('mahasiswa_images',$request->nim.'.'.$request->file('update_image')->extension(), 'public');
        }

        $mahasiswa->update($validatedData);

        Alert::success('Success', 'Mahasiswa berhasil diupdate!');

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if($mahasiswa->delete()){
            Alert::success('Success', 'Mahasiswa berhasil dihapus!');
        }
        Storage::delete('public/' . $mahasiswa->image_mhs);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }

    public function nilai(Mahasiswa $mahasiswa){
        return view('mahasiswa.nilai', compact('mahasiswa'));
    }

    public function exporPDf(Mahasiswa $mahasiswa){
        $pdf = PDF::loadView('mahasiswa.cetak-pdf', compact('mahasiswa'))->setPaper('a3', 'portrait');
        return $pdf->download('nilai-' . $mahasiswa->nama . '.pdf');
    }

    public function search (Request $request){
        $keyword = $request->get('keyword');
        $mahasiswas = Mahasiswa::search($keyword)->paginate(5);
        return view('mahasiswa.index', compact('mahasiswas'));
    }
}
