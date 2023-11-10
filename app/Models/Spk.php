<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    use HasFactory;
    
    protected $table = 'Spk';
    public $timestamps = false;
    protected $fillable = ['kode_kriteria', 'kode_nilai_kriteria', 'permohonan_id'];


    public function kriteria() {
        return $this->hasOne(Kriteria::class, 'kode', 'kode_kriteria');
    }

    public function nilaiKriteria() {
        return $this->hasOne(NilaiKriteria::class, 'kode', 'kode_nilai_kriteria');
    }

}
