<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use App\Models\Kriteria;
use App\Models\Nasabah;
use App\Models\PerhitunganAhp;
use App\Models\Spk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganAhpController extends Controller
{
    use MasterCRUD;

    public function __construct()
    {
        $this->setModel(\App\Models\PerhitunganAhp::class);
        $this->setTitle('Perhitungan Ahp');

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

    public function index()
    {
        $data = PerhitunganAhp::with('nasabah')->get()->map(function ($item) {
            $item->spk_data = Spk::with(['kriteria','nilaiKriteria'])->where('permohonan_id', $item->id)->get();
            return $item;
        });

        $nasabah = Nasabah::all();
        return view('pages.master.perhitungan_ahp.index', compact('data', 'nasabah'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
           $record = PerhitunganAhp::create([
                'nasabah_id' => $request->nasabah_id,
                'status' => $request->status,
                'nominal_peminjaman' => $request->nominal_peminjaman
            ]);

            $idPermohonan = $record->id;

            $spk = [];

            foreach ($request->kriteria as $kriteria => $nilai_kriteria) {
                $spk[] = [
                    'kode_kriteria' => $kriteria,
                    'kode_nilai_kriteria' => $nilai_kriteria,
                    'permohonan_id' => $idPermohonan
                ];
            }

            Spk::insert($spk);
            DB::commit();
            return redirect()->back()->with('success', "Data {$this->title} berhasil dibuat");

        } catch (\Exception $ex) {
            @dd($ex->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', "Data {$this->title} gagal dibuat");
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $permohonan = PerhitunganAhp::find($id);
            $permohonan->update([
                'nasabah_id' => $request->nasabah_id,
                'status' => $request->status,
                'nominal_peminjaman' => $request->nominal_peminjaman
            ]);

            foreach ($request->kriteria as $kriteria => $nilai_kriteria) {
                 Spk::where('permohonan_id', $id)->updateOrInsert([
                    'kode_kriteria' => $kriteria,
                    'kode_nilai_kriteria' => $nilai_kriteria,
                    'permohonan_id' => $id
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', "Data {$this->title} berhasil diubah");
        }catch(\Exception $ex){
            @dd($ex->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', "Data {$this->title} gagal diubah");
        }
    }
}
