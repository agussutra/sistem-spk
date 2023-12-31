<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_nasabah', 'jk', 'no_hp','alamat','pekerjaan'];
}
