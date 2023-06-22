<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\MahasiswaMatakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $with = ['kelas'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mahasiswaMatakuliah(){
        return $this->hasMany(MahasiswaMatakuliah::class);
    }

    public static function search($keyword){
        return self::where('nama', 'like', '%'. $keyword .'%');
    }
}
