<?php

namespace App\Models;

use App\Traits\ModelDropdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    use ModelDropdown;

    protected $table = 'kriteria';
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $fillable = ['kode','nama_kriteria','kriteria','keterangan'];

    public function nilaiKriteria() {
        return $this->hasMany(NilaiKriteria::class , 'kode_kriteria' , 'kode');
    }

    public static function generateUniqueKode()
    {
        $latestRecord = static::orderBy('kode', 'desc')->first();

        if ($latestRecord) {
            $latestKode = $latestRecord->kode;
            $number = intval(substr($latestKode, 2)) + 1;
            $newKode = 'K' . str_pad($number, 2, '0', STR_PAD_LEFT);
        } 
        return $newKode;
    }
}
