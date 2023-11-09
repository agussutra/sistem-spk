<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use App\Models\Nasabah;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    use MasterCRUD;

    public function __construct()
    {
        $this->setModel(\App\Models\Permohonan::class);
        $this->setTitle('Permohanan');

        $this->setValidationRule([
            'nasabah_id' => 'required', 
            'status' => 'required', 
            'nominal_peminjaman' => 'required'
        ]);

        $this->setValidationRuleMassage([
            'nasabah_id.required' => 'Masukan Nasabah', 
            'status.required' => 'Pilih Status', 
            'nominal_peminjaman.required' => 'Nominal Peminjaman Harus Diisi'
        ]);

    }

    public function index() {
        $data = Permohonan::with('nasabah')->get();
        $nasabah = Nasabah::all();
        return view('pages.master.permohonan.index',compact('data','nasabah'));
    }

}
