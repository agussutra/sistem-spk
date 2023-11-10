<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    use HasFactory;

    protected $table = 'spk';
    protected $fillable = ['kode_kriteria', 'kode_nilai_kriteria', 'permohonan_id'];

    public function nilai() {
        return $this->belongsTo(NilaiKriteria::class, 'kode_nilai_kriteria', 'kode');
    }
}
