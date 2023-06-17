<?php

namespace App\Models;

use App\Models\MahasiswaMatakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    protected $guarded = ['id'];

    public function mahasiswaMatakuliah(){
        return $this->hasMany(MahasiswaMatakuliah::class);
    }
}
