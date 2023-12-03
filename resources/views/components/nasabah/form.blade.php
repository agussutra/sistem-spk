<div id="form-modal">
    <label for="nama_nasabah" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nama Nasabah</label>
    <input type="text" name="nama_nasabah" id="nama_nasabah" class="input-form" placeholder="Suryani">
    <label for="no_hp" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">No Hp</label>
    <input type="text" name="no_hp" id="no_hp" class="input-form" placeholder="">
    <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Alamat</label>
    <input type="text" name="alamat" id="alamat" class="input-form">
    <div>
        <label for="pekerjaan" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Pekerjaan</label>
        <select name="pekerjaan" id="pekerjaan" class="dropdown-input text-black w-full">
            <option>Pilih Pekerjaan</option>
            @php
                $data_pekerjaan = \App\Models\Nasabah::select('pekerjaan')->groupBy('pekerjaan')->get();
            @endphp
            @if($data_pekerjaan->count() !== 0)
            @foreach (\App\Models\Nasabah::select('pekerjaan')->groupBy('pekerjaan')->get() as $item)                
                <option value="{{ $item->pekerjaan }}">{{ $item->pekerjaan }}</option>
            @endforeach
            @else
            <option value="PNS">PNS</option>
            <option value="Pekerja Lepass">Pekerja Lepas</option>
            <option value="Wirausaha">Wirausaha</option>
            @endif
        </select>
    </div>
    <div>
        <label for="jk" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Jenis Kelamin</label>
        <select name="jk" id="jk" class="dropdown-input text-black">
            <option value="0">Pilih Jenis Kelamin</option>
            <option value="1">Laki-Laki</option>
            <option value="2" >Perempuan</option>
        </select>
    </div>
</div>

{{-- read form --}}
<div id="form-modal-read">
    <label for="nama_nasabah" class="font block text-sm font-medium leading-6 text-gray-900">Nama Nasabah</label>
    <p class="font-medium text-gray-600 mb-3"><span class="nama_nasabah"></span></p>
    <label for="no_hp" class="font block text-sm font-medium leading-6 text-gray-900">No. Hp</label>
    <p class="text font-medium text-gray-600 mb-3"><span class="no_hp"></span></p>
    <label for="alamat" class="font block text-sm font-medium leading-6 text-gray-900">Alamat</label>
    <p class="text font-medium text-gray-600 mb-3"><span class="alamat"></span></p>
    <label for="pekerjaan" class="font block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
    <p class="text font-medium text-gray-600 mb-3"><span class="pekerjaan"></span></p>
    <label for="jk" class="font block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
    <p class="text font-medium text-gray-600 mb-3"><span class="jk"></span></p>
</div>

