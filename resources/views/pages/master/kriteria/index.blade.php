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
                <button type="button" class="btn-create openModal" id="createBtn" onclick="tambahData()">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
           @foreach ($data as $index )
           @endforeach
            <div>
                @include('components.table', [
                    'headers' => ['No','Kode','Nama Kriteria', 'Kriteria'],
                    'data' => $data,
                    'mapping' => ['__INCREMENT__' ,'kode', 'nama_kriteria', 'kriteria'],
                    'actionUpdate' => true,
                    'actionDelete' => false,
                    'actionShow' => false,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        <x-modal :formAction="$formAction" :formMethod="$formMethod" :formData="'components.kriteria.form'" id="form"  />

    </div>
    <script>
        const action = $(this).data('action');
        const modal = $('#interestModal');
        const form = modal.find('form');

        $('.closeModal').on('click', function(e) {
            $('#interestModal').addClass('hidden');
            $('#nama_kriteria').val('');
            $('#kode').val('');
            $('#kriteria').val('');
            $('#keterangan').val('');
        });

        function editData(item) {
            modal.find('#titleModal').html('Edit Data');
            modal.find('#btnModal').html('Edit');

            const formAction = '{{ route('kriteria.index') }}/' + item.kode;
            const formMethod = 'POST';

            form.append('<input type="hidden" value="PUT" name="_method"/>');

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form
            modal.find('#kode').val(item.kode);
            console.log(item.kode);
            modal.find('#nama_kriteria').val(item.nama_kriteria);
            modal.find('#kriteria').val(item.kriteria);
            modal.find('#keterangan').val(item.keterangan);

            // isian form
            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');

            modal.removeClass('hidden');
        }

        function tambahData() {

            modal.find('#titleModal').html('Tambah Data');
            modal.find('#btnModal').html('Tambah');
            form.append('<input type="hidden" value="POST" name="_method"/>');

            const formAction = '{{ route('kriteria.store') }}'
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);
            $('#kode').val('{{ App\Models\Kriteria::generateUniqueKode() }}');
            

            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');
            modal.removeClass('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            modal.addClass('hidden');
        });
    </script>
@endsection
