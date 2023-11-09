<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAhp extends Model
{
    use HasFactory;

    protected $table = 'permohonan';
    protected $fillable = ['nasabah_id','status', 'nominal_peminjaman'];

    public function nasabah(){
        return $this->belongsTo(Nasabah::class , 'nasabah_id' , 'id');
    }

    public function spk() {
        return $this->belongsToMany(Kriteria::class, 'spk', 'permohonan_id' , 'kode_kriteria')->using(Spk::class)->withPivot(['kode_kriteria' , 'kode_nilai_kriteria']);
    }
}
