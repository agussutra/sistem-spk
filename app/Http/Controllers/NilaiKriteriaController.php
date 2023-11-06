<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use Illuminate\Http\Request;

class NilaiKriteriaController extends Controller
{
    use MasterCRUD;

    public function __construct()
    {
        $this->setViewFolder('pages.master.nilai_kriteria');
        $this->setModel(\App\Models\NilaiKriteria::class);
        $this->setTitle('Kriteria');

        $this->setValidationRule([
            'kode_kriteria' => 'required', 
            'nilai' => 'required', 
            'nilai_kriteria' => 'required',
        ]);

        $this->setValidationRuleMassage([
            'kode_kriteria.required' => 'Pilih Kirteria', 
            'nilai.required' => 'Masukan Nilai',
            'nilai_kriteria.required' => 'Masukan Nama Nilai Kriteria'
        ]);

    }
}
