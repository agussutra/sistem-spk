<div id="form-modal">
    <div>
        <label for="nasabah_id" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nasabah</label>
        <select name="nasabah_id" id="nasabah_id" class="dropdown-input text-black">
            <option value="0">Pilih Nasabah</option>
            @foreach ($nasabah as $nb )
                <option value="{{ $nb->id }}">{{ $nb->nama_nasabah }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="status" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Status</label>
        <select name="status" id="status" class="dropdown-input text-black">
            <option value="0">Pending</option>
            <option value="1">Approve</option>
        </select>
    </div>
    <label for="nominal_peminjaman" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Nominal Peminjaman</label>
    <input type="text" name="nominal_peminjaman" id="nominal_peminjaman" class="input-form" placeholder="">
</div>
