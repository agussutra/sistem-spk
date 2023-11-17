<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAhp extends Model
{
    use HasFactory;

    protected $table = 'permohonan';
    protected $fillable = ['nasabah_id','status', 'nominal_peminjaman'];
    public $timestamp = false;

    public function nasabah(){
        return $this->belongsTo(Nasabah::class , 'nasabah_id' , 'id');
    }

    public function spk() {
        return $this->hasMany(Spk::class, 'permohonan_id', 'id');
    }
}
