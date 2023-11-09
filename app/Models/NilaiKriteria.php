<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    use HasFactory;

    protected $table = 'nilai_kriteria';
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $fillable = ['kode','kode_kriteria', 'nilai_kriteria', 'nilai'];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode');
    }

    public static function generateUniqueKode()
    {
        $latestRecord = static::orderBy('kode', 'desc')->first();

        if ($latestRecord) {
            $latestKode = $latestRecord->kode;
            $number = intval(substr($latestKode, 2)) + 1;
            $newKode = 'KN' . str_pad($number, 2, '0', STR_PAD_LEFT);
        } else {
            'KN01';
        }
        return $newKode;
    }
}
