<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    use HasFactory;

    protected $table = 'nilai_kriteria';
    protected $fillable = ['kode_kriteria', 'nilai_kriteria', 'nilai'];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode');
    }
}
