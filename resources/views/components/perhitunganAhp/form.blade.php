<div id="form-modal">
    <label for="nasabah_id" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nasabah</label>
    <select name="nasabah_id" id="nasabah_id" class="dropdown-input text-black">
        @foreach ($nasabah as $nb)
            <option value="{{ $nb->id }}">{{ $nb->nama_nasabah }}</option>
        @endforeach
    </select>
    <label for="status" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Status</label>
    <select name="status" id="status" class="dropdown-input text-black">
        <option value="0">Pending</option>
        <option value="1">Approve</option>
    </select>
    <label for="nominal_peminjaman" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Nominal</label>
    <input type="number" name="nominal_peminjaman" id="nominal_peminjaman" class="input-form">

    <p class="text-base font-semibold mt-4">Kriteria</p>
    <div class="bg-slate-50 w-full rounded-sm shadow-md p-4 border">
        <div class="grid grid-cols-3 gap-2">
            @foreach (\App\Models\Kriteria::dropdown('kode', 'nama_kriteria') as $kriteria)
                <div>
                    <label for="nasabah"
                        class="block text-sm font-medium leading-6 text-gray-900 mb-2">{{ $kriteria['nama_kriteria'] }}</label>
                    <select name="kriteria[{{$kriteria['kode']}}]" id="idkriteria" class="dropdown-input text-black">
                        <option hidden>Pilih {{$kriteria['nama_kriteria']}}</option>
                        @foreach (\App\Models\NilaiKriteria::where('kode_kriteria', $kriteria['kode'])->get() as $nilaiKriteria)
                            <option value="{{ $nilaiKriteria->kode }}">{{ $nilaiKriteria->nilai_kriteria }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
    </div>

</div>

{{-- read form --}}
<div id="form-modal-read">
    <label for="namaNasabah" class="font block text-sm font-medium leading-6 text-gray-900">Nama Nasabah</label>
    <p class="font-medium text-gray-600 mb-3"><span class="namaNasabah"></span></p>
    <label for="status" class="font block text-sm font-medium leading-6 text-gray-900">Status</label>
    <p class="font-medium text-gray-600 mb-3"><span class="status"></span></p>
    <label for="nominal" class="font block text-sm font-medium leading-6 text-gray-900">Nominal</label>
    <p class="font-medium text-gray-600 mb-3"><span class="nominal"></span></p>
    <span class="font-bold mt-4 mb-2 text-base">ITEM SPK</span>
    <ul id="daftarSpkData">
    </ul>
</div>
