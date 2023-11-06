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
            <p>Data Kriteria</p>
        </div>
        <div class="card">
            <div class="flex justify-between mb-3">
                <button type="button" class="btn-create openModal" id="createBtn">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Nama Kriteria', 'Kriteria'],
                    'data' => $data,
                    'mapping' => ['__INCREMENT__', 'nama_kriteria', 'kriteria'],
                    'actionUpdate' => true,
                    'actionDelete' => false,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        @include('components.modal', [
            'form' => 'components.kriteria.form',
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
                    const bobot = $(this).data('bobot');
                    const nama_kriteria = $(this).data('nama_kriteria');

                    modal.find('#bobot').val(bobot);
                    modal.find('#nama_kriteria').val(nama_kriteria);

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
                    const bobot = $(this).data('bobot');
                    const nama_kriteria = $(this).data('nama_kriteria');

                    modal.find('.bobot').html(bobot);
                    modal.find('.nama_kriteria').html(nama_kriteria);

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
                $('#bobot').val('');
                $('#nama_kriteria').val('');
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
