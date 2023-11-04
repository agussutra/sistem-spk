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
            <p>Data Pehitungan AHP</p>
        </div>
        <div class="card">
            <div class="flex justify-between mb-3">
                <button type="button" class="btn-create openModal" id="createBtn">Tambah</button>
            </div>
            <hr class="mb-2"> 
            {{-- list table --}}
            <div>
                <table class="h-full w-full" id="table">
                    <thead>
                        <tr>
                            <th class="border" rowspan="2">No.</th>
                            <th class="border" rowspan="2">Alternatif</th>
                            <th class="border" rowspan="2">Nama Nasabah</th>
                            <th class="border" colspan="5">Kriteria</th>
                          </tr>
                          <tr>
                            <th class="border">K1</th>
                            <th class="border">K2</th>
                            <th class="border">K3</th>
                            <th class="border">K4</th>
                            <th class="border">K5</th>
                          </tr>
                    </thead>
                    <tbody>
                        <tr class="border">
                            <td class="border">1</td>
                            <td class="border">A01</td>
                            <td class="border">Wayan Sulaksmi</td>
                            <td class="border">0</td>
                            <td class="border">0</td>
                            <td class="border">1</td>
                            <td class="border">0</td>
                            <td class="border">1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- modal --}}
        @include('components.modal', [
            'form' => 'components.perhitunganAhp.form',
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
                    const subKriteria = $(this).data('sub_kriteria');
                    const keterangan = $(this).data('keterangan');
                    const nilaiBobot = $(this).data('nilai_bobot');

                    modal.find('#subkriteria').val(subKriteria);
                    modal.find('#keterangan').val(keterangan);
                    modal.find('#nilaibobot').val(nilaiBobot);

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
                    const subKriteria = $(this).data('sub_kriteria');
                    const keterangan = $(this).data('keterangan');
                    const nilaiBobot = $(this).data('nilai_bobot');

                    modal.find('#subkriteria').html(subKriteria);
                    modal.find('#keterangan').html(keterangan);
                    modal.find('#nilaibobot').html(nilaiBobot);

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
                $('#subkriteria').val('');
                $('#keterangan').val('');
                $('#nilaibobot').val('');
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
