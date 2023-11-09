<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class NilaiKriteriaController extends Controller
{
    use MasterCRUD;

    public function __construct()
    {
        $this->setModel(\App\Models\NilaiKriteria::class);
        $this->setTitle('Sub Kriteria');

        $this->setValidationRule([
            'kode' => 'required', 
            'kode_kriteria' => 'required', 
            'nilai_kriteria' => 'required',
            'nilai' => 'required',
        ]);

        $this->setValidationRuleMassage([
            'kode.required' => 'Kode Harus Diisi', 
            'kode_kriteria.required' => 'Kriteria Harus Dipilih',
            'nilai_kriteria.required' => 'Masukan Nilai Kriteria',
            'nilai.required' => 'Masukan Nilai Sub',
        ]);
    }

    public function index() {
        $data = NilaiKriteria::all();
        $kriteria = Kriteria::all();
        return view('pages.master.nilai_kriteria.index',compact('data','kriteria'));
    }
}
