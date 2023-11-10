<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    use MasterCRUD;

    public function __construct()
    {
        $this->setViewFolder('pages.master.nasabah');
        $this->setModel(\App\Models\Nasabah::class);
        $this->setTitle('Nasabah');

        $this->setValidationRule([
            'nama_nasabah' => 'required', 
            'no_hp' => 'required', 
            'jk' => 'required', 
            'pekerjaan' => 'required',
            'alamat' => 'required'
        ]);

        $this->setValidationRuleMassage([
            'nama_nasabah.required' => 'Masukan Nama Nasabah', 
            'no_hp.required' => 'Masukan No. Hp', 
            'alamat.required' => 'Masukan Alamat',
            'pekerjaan.required' => 'Masukan Pekerjaan', 
            'jk.required' => 'Pilih Jenis Kelamin'
        ]);
    }
}
