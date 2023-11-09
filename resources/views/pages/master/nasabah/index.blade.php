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
                <button type="button" class="btn-create" id="createBtn" onclick="tambahData()">Tambah</button>
            </div>
            <hr class="mb-2">

            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Nama Nasabah', 'No Hp'],
                    'data' => $data,
                    'mapping' => ['__INCREMENT__', 'nama_nasabah','no_hp'],
                    'actionUpdate' => true,
                    'actionDelete' => true,
                    'actionShow' => false,
                    'aksi' => true,
                ])
            </div>
        </div>

        <x-modal :formAction="$formAction" :formMethod="$formMethod" :formData="'components.nasabah.form'" id="form"  />

    </div>
    <script>
        const action = $(this).data('action');
        const modal = $('#interestModal');
        const form = modal.find('form');

        $('.closeModal').on('click', function(e) {
            $('#interestModal').addClass('hidden');
            $('#nama_nasabah').val('');
            $('#no_hp').val('');
            $('#alamat').val('');
            $('#pekerjaan').val('');
            $('#jk').val('');
        });

        function editData(item) {
            modal.find('#titleModal').html('Edit Data');
            modal.find('#btnModal').html('Edit');

            const formAction = '{{ route('nasabah.index') }}/' + item.id;
            const formMethod = 'POST';

            form.append('<input type="hidden" value="PUT" name="_method"/>');

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form
            modal.find('#nama_nasabah').val(item.nama_nasabah);
            modal.find('#no_hp').val(item.no_hp);
            modal.find('#jk').val(item.jk);
            modal.find('#alamat').val(item.alamat);
            modal.find('#pekerjaan').val(item.pekerjaan);

            // isian form
            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');

            modal.removeClass('hidden');
        }

        function tambahData() {

            modal.find('#titleModal').html('Tambah Data');
            modal.find('#btnModal').html('Tambah');
            form.append('<input type="hidden" value="POST" name="_method"/>');

            const formAction = '{{ route('nasabah.store') }}'
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

            const formAction = '{{ route('nasabah.index') }}/' + item.id;
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form read
            modal.find('.nama_nasabah').html(item.nama_nasabah);
            modal.find('.no_hp').html(item.no_hp);
            modal.find('.alamat').html(item.alamat);
            modal.find('.pekerjaan').html(item.pekerjaan);
            modal.find('.jk').html((item.jk === 1) ? 'Laki-laki' : 'Perempuan');

            $('#form-modal').addClass('hidden');
            $('#form-modal-read').removeClass('hidden');
            modal.removeClass('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            modal.addClass('hidden');
        });
    </script>
@endsection
