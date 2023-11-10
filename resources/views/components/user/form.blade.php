<div id="form-modal">
    <label for="nama_user" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Nama User</label>
    <input type="text" name="nama_user" id="nama_user" class="input-form" placeholder="Admin">
    <label for="username" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Username</label>
    <input type="text" name="username" id="username" class="input-form" placeholder="Admin">
    <label for="password" class="block text-sm font-medium leading-6 text-gray-900 mb-2 mt-2">Password</label>
    <input type="password" name="password" id="password" class="input-form">
    <div>
        <label for="jabatan" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Jabatan</label>
        <select name="jabatan" id="jabatan" class="dropdown-input text-black">
            <option value="Admin">Admin</option>
            <option value="User" >User</option>
        </select>
    </div>
</div>

{{-- read form --}}
<div id="form-modal-read">
    <label for="nama_user" class="font block text-sm font-medium leading-6 text-gray-900">Nama User</label>
    <p class="font-medium text-gray-600 mb-3"><span class="nama_user"></span></p>
    <label for="username" class="font block text-sm font-medium leading-6 text-gray-900">Username</label>
    <p class="font-medium text-gray-600 mb-3"><span class="username"></span></p>
    <label for="jabatan" class="font block text-sm font-medium leading-6 text-gray-900">Jabatan</label>
    <p class="font-medium text-gray-600"><span class="jabatan"></span></p>
</div>

