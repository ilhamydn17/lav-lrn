<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MahasiswaMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'nilai_matakuliah';

    protected $guarded = ['id'];

    protected $with = ['mahasiswa', 'matakuliah'];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }
}
