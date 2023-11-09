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
            <p>Data Permohonan</p>
        </div>
        <div class="card">
            <div class="flex justify-between mb-3">
                <button type="button" class="btn-create openModal" id="createBtn" onclick="tambahData()">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No','Nasabah','Status', 'Nominal Peminjaman'],
                    'data' => $data,
                    'mapping' => [
                        '__INCREMENT__', 
                        function ($a) {
                            return $a->nasabah?->nama_nasabah;
                        },
                        'status', 
                        'nominal_peminjaman'],
                    'actionUpdate' => true,
                    'actionDelete' => false,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        <x-modal :formAction="$formAction" :formMethod="$formMethod" :formData="'components.permohonan.form'" id="form" :nasabah="$nasabah"  />

    </div>
    <script>
        const action = $(this).data('action');
        const modal = $('#interestModal');
        const form = modal.find('form');

        $('.closeModal').on('click', function(e) {
            $('#interestModal').addClass('hidden');
            $('#nasabah_id').val('');
            $('#status').val('');
            $('#nominal_peminjaman').val('');
        });

        function editData(item) {
            modal.find('#titleModal').html('Edit Data');
            modal.find('#btnModal').html('Edit');

            const formAction = '{{ route('permohonan.index') }}/' + item.id;
            const formMethod = 'POST';

            form.append('<input type="hidden" value="PUT" name="_method"/>');

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form
            modal.find('#nasabah_id').val(item.nasabah_id);
            modal.find('#status').val(item.status);
            modal.find('#nominal_peminjaman').val(item.nominal_peminjaman);

            // isian form
            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');

            modal.removeClass('hidden');
        }

        function tambahData() {

            modal.find('#titleModal').html('Tambah Data');
            modal.find('#btnModal').html('Tambah');
            form.append('<input type="hidden" value="POST" name="_method"/>');

            const formAction = '{{ route('permohonan.store') }}'
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);

            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');
            modal.removeClass('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            modal.addClass('hidden');
        });
    </script>
@endsection
