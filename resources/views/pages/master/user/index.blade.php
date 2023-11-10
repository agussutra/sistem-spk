@extends('pages.layout')
@section('content')
    @php
        $formAction = '';
        $formMethod = '';
    @endphp
    <div>
        @include('components.successAlert')
        @include('components.errorAlert')
    </div>
    <div>
        <div class="mb-4 text-2xl font-bold">
            <p>Data User</p>
        </div>
        <div class="card">
            <div class="flex justify-between mb-3">
                <button type="button" class="btn-create" id="createBtn" onclick="tambahData()">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Nama User', 'Username', 'Jabatan'],
                    'data' => $data,
                    'mapping' => ['__INCREMENT__', 'nama_user', 'username', 'jabatan'],
                    'actionUpdate' => true,
                    'actionDelete' => true,
                    'actionShow' => false,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        <x-modal :formAction="$formAction" :formMethod="$formMethod" :formData="'components.user.form'" id="form" />

    </div>
    <script>
        const action = $(this).data('action');
        const modal = $('#interestModal');
        const form = modal.find('form');

        $('.closeModal').on('click', function(e) {
            $('#interestModal').addClass('hidden');
            $('#nama_user').val('');
            $('#username').val('');
            $('#password').val('');
            $('#jabatan').val('');
        });

        function editData(item) {
            modal.find('#titleModal').html('Edit Data');
            modal.find('#btnModal').html('Edit');

            const formAction = '{{ route('user.index') }}/' + item.id;
            const formMethod = 'POST';

            form.append('<input type="hidden" value="PUT" name="_method"/>');

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form
            modal.find('#nama_user').val(item.nama_user);
            modal.find('#username').val(item.username);
            modal.find('#password').val('');
            modal.find('#jabatan').val(item.jabatan);

            // isian form
            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');

            modal.removeClass('hidden');
        }

        function tambahData() {

            modal.find('#titleModal').html('Tambah Data');
            modal.find('#btnModal').html('Tambah');
            form.append('<input type="hidden" value="POST" name="_method"/>');

            const formAction = '{{ route('user.store') }}'
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);

            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');
            modal.removeClass('hidden');
        }


        function hapusData(item) {

            modal.find('#titleModal').html('Apakah Anda Yakin Ingin Menghapus Data Berikut ?');
            modal.find('#btnModal').html('delete');
            form.append('<input type="hidden" value="DELETE" name="_method"/>');

            const formAction = '{{ route('user.index') }}/' + item.id;
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form read
            modal.find('.nama_user').html(item.nama_user);
            modal.find('.username').html(item.username);
            modal.find('.jabatan').html(item.jabatan);

            $('#form-modal').addClass('hidden');
            $('#form-modal-read').removeClass('hidden');
            modal.removeClass('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            modal.addClass('hidden');
        });
    </script>
@endsection
