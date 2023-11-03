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
                <button type="button" class="btn-create openModal" id="createBtn">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Username', 'Jabatan', 'No. Tlp'],
                    'data' => [['id' => '1', 'nama' => 'miya khalifa', 'jabatan' => 'admin', 'no_tlp'=> '09887877']],
                    'mapping' => ['__INCREMENT__', 'nama', 'jabatan', 'no_tlp'],
                    'actionUpdate' => true,
                    'actionDelete' => true,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        @include('components.modal', [
            'form' => 'components.user.form',
        ])

    </div>
    <script>
        $(document).ready(function() {
            $('.openModal').on('click', function(e) {
                const action = $(this).data('action');
                const modal = $('#interestModal');
                const form = modal.find('form');

                if (action === 'edit') {
                    modal.find('#titleModal').html('Edit Data');
                    modal.find('#btnModal').html('Edit');
                    const formAction = ''
                    const formMethod = '';

                    form.attr('action', formAction);
                    form.attr('method', formMethod);

                    // isian form
                    const username = $(this).data('nama');
                    const jabatan = $(this).data('jabatan');
                    const noTlp = $(this).data('no_tlp');

                    modal.find('#username').val(username);
                    modal.find('#jabatan').val(jabatan);
                    modal.find('#noTlp').val(noTlp);

                    // isian form

                    $('#form-modal').removeClass('hidden');
                    $('#form-modal-read').addClass('hidden');
                } else if (action == 'delete') {
                    modal.find('#titleModal').html('Apakah Anda Yakin Ingin Menghapus Data Berikut ?');
                    modal.find('#btnModal').html('delete');
                    const formAction = ''
                    const formMethod = '';

                    form.attr('action', formAction);
                    form.attr('method', formMethod);

                    // isian form read
                    const username = $(this).data('nama');
                    const jabatan = $(this).data('jabatan');
                    const noTlp = $(this).data('no_tlp');

                    modal.find('.username').html(username);
                    modal.find('.jabatan').html(jabatan);
                    modal.find('.noTlp').html(noTlp);

                    // isian form read

                    $('#form-modal').addClass('hidden');
                    $('#form-modal-read').removeClass('hidden');
                } else {

                    const formAction = ''
                    const formMethod = '';

                    form.attr('action', formAction);
                    form.attr('method', formMethod);

                    modal.find('#titleModal').html('Tambah Data');
                    modal.find('#btnModal').html('Tambah');
                    $('#form-modal').removeClass('hidden');
                    $('#form-modal-read').addClass('hidden');
                }
                modal.removeClass('hidden');
            });

            $('.closeModal').on('click', function(e) {
                $('#interestModal').addClass('hidden');
                $('#username').val('');
                $('#jabatan').val('');
                $('#noTlp').val('');
            });
        });

        $('#closeSuccessAlert').on('click', function(e) {
                $('#successAlert').addClass('hidden');
            });

        $('#closeErrorAlert').on('click', function(e) {
                $('#errorAlert').addClass('hidden');
            });
    </script>
@endsection
