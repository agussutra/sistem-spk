<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan';
    protected $fillable = ['nasabah_id', 'status'];

    public function spk() {
        return $this->hasMany(SPK::class);
    }
}
