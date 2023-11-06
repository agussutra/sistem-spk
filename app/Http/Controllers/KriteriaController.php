<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{

    use MasterCRUD;

    public function __construct()
    {
        $this->setViewFolder('pages.master.kriteria');
        $this->setModel(\App\Models\Kriteria::class);
        $this->setTitle('Kriteria');

        $this->setValidationRule([
            'nama_kriteria' => 'required', 
            'bobot' => 'required', 
            'kriteria' => 'required|in:BENEFIR,COST', 
            'keterangan' => 'required'
        ]);

        $this->setValidationRuleMassage([
            'nama_kriteria.required' => 'Masukan Nama Kriteria', 
            'bobot.required' => 'Masukan Bobot Kriteria', 
            'kriteria.required' => 'Masukan Tipe Kriteria',
            'kriteria.in' => 'Tipe Kriteria harus BENEFIT atau COST', 
            'keterangan.required' => 'Masukan Keterangan'
        ]);

    }

}
