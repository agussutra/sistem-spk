<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{

    use MasterCRUD;

    public function __construct()
    {

        $newKode = Kriteria::generateUniqueKode();

        $this->setViewFolder('pages.master.kriteria');
        $this->setModel(\App\Models\Kriteria::class);
        $this->setTitle('Kriteria');

        $this->setValidationRule([
            'kode' => 'required', 
            'nama_kriteria' => 'required', 
            'kriteria' => 'required|in:BENEFIT,COST', 
            'keterangan' => 'required'
        ]);

        $this->setValidationRuleMassage([
            'kode.required' => 'Masukan Kode Kriteria', 
            'nama_kriteria.required' => 'Masukan Nama Kriteria', 
            'kriteria.in' => 'Tipe Kriteria harus BENEFIT atau COST', 
            'keterangan.required' => 'Masukan Keterangan'
        ]);

    }

}
