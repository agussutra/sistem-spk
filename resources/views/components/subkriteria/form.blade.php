<div id="form-modal">
    <div>
        <label for="kode_kriteria" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Kriteria</label>
        <select name="kode_kriteria" id="kode_kriteria" class="dropdown-input text-black">
            @foreach ($kriteria as $kr )
            <option value="{{ $kr->kode }}">{{ $kr->nama_kriteria }}</option>
            @endforeach
        </select>
    </div>
    <label for="kode" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Kode Sub Kriteria</label>
    <input type="text" name="kode" id="kode" class="input-form bg-gray-300" placeholder="K01-1" readonly>
    <label for="nilai_kriteria" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Nilai Kriteria</label>
    <input type="text" name="nilai_kriteria" id="nilai_kriteria" class="input-form" placeholder="Cukup">
    <label for="nilai" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2" placeholder="8">Nilai</label>
    <input type="number" name="nilai" id="nilai" class="input-form" placeholder="">
</div>


