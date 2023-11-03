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
            <p>Data Nasabah</p>
        </div>
        <div class="card">
            <div class="flex justify-between mb-3">
                <button type="button" class="btn-create openModal" id="createBtn">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Id Nasabah', 'Nama Nasabah', 'Tgl Masuk'],
                    'data' => [['id' => '123', 'nama' => 'Gusut', 'tgl_masuk' => '2023-01-01']],
                    'mapping' => ['__INCREMENT__', 'id', 'nama', 'tgl_masuk'],
                    'actionUpdate' => true,
                    'actionDelete' => true,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        @include('components.modal', [
            'form' => 'components.nasabah.form',
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
                    const nasabahId = $(this).data('id');
                    const namaNasabah = $(this).data('nama');
                    const tglMasuk = $(this).data('tgl_masuk');

                    modal.find('#idNasabah').val(nasabahId);
                    modal.find('#namaNasabah').val(namaNasabah);
                    modal.find('#tglMasuk').val(tglMasuk);

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
                    const nasabahId = $(this).data('id');
                    const namaNasabah = $(this).data('nama');
                    const tglMasuk = $(this).data('tgl_masuk');

                    modal.find('.idNasabah').html(nasabahId);
                    modal.find('.nama').html(namaNasabah);
                    modal.find('.tglMasuk').html(tglMasuk);

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
                $('#idNasabah').val('');
                $('#namaNasabah').val('');
                $('#tglMasuk').val('');
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
