<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use MasterCRUD;

    public function __construct()
    {
        $kriteria = Kriteria::all();
        $this->setViewFolder('pages.master.nilai_kriteria',['kriteria' => $kriteria]);
        $this->setModel(\App\Models\Kriteria::class);
        $this->setTitle('Sub Kriteria');

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
