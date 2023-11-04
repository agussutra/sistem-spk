<div id="form-modal">
    <label for="alternatif" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Alternatif</label>
    <input type="text" name="alternatif" id="alternatif" class="input-form mb-2" placeholder="A01">
    <label for="nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nasabah</label>
    <select name="nasabah" id="nasabah" class="dropdown-input text-black">
        <option value="">Pilih Nasabah</option>
        <option value="">Sulaksmi</option>
        <option value="">Nadia Omara</option>
    </select>

    <p class="text-base font-semibold mt-4">Kriteria</p>
    <div class="bg-slate-50 w-full rounded-sm shadow-md p-4 border">
        <div class="grid grid-cols-3 gap-2">
            <div>
                <label for="nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Riwayat 
                    Kredit</label>
                <select name="nasabah" id="nasabah" class="dropdown-input text-black">
                    <option value="">Pilih Kriteria</option>
                    <option value="" >1</option>
                </select>
            </div>
            <div>
                <label for="nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Pekerjaan</label>
                <select name="nasabah" id="nasabah" class="dropdown-input text-black">
                    <option value="">Pilih Kriteria</option>
                    <option value="" >2</option>
                </select>
            </div>
            <div>
                <label for="nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Penghasilan</label>
                <select name="nasabah" id="nasabah" class="dropdown-input text-black">
                    <option value="">Pilih Kriteria</option>
                    <option value="" >3</option>
                </select>
            </div>
            <div>
                <label for="nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nilai 
                    Jaminan</label>
                <select name="nasabah" id="nasabah" class="dropdown-input text-black">
                    <option value="">Pilih Kriteria</option>
                    <option value="" >4</option>
                </select>
            </div>
            <div>
                <label for="nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Jangka 
                    Waktu</label>
                <select name="nasabah" id="nasabah" class="dropdown-input text-black">
                    <option value="">Pilih Kriteria</option>
                    <option value="" >5</option>
                </select>
            </div>
        </div>
    </div>

</div>

{{-- read form --}}
<div id="form-modal-read">
    <label for="subkriteria" class="font block text-sm font-medium leading-6 text-gray-900">Sub Kriteria</label>
    <p class="font-medium text-gray-600 mb-3"><span class="subkriteria"></span></p>
    <label for="keterangan" class="font block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
    <p class="font-medium text-gray-600 mb-3"><span class="keterangan"></span></p>
    <label for="nilaibobot" class="font block text-sm font-medium leading-6 text-gray-900">Nilai Bobot</label>
    <p class="font-medium text-gray-600 mb-3"><span class="nilaibobot"></span></p>
</div>
