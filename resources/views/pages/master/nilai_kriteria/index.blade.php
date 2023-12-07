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
            <p>Data Sub Kriteria</p>
        </div>
        <div class="card">
            <div class="flex justify-between mb-3">
                <button type="button" class="btn-create openModal" id="createBtn" onclick="return tambahData();">Tambah</button>
            </div>
            <hr class="mb-2">
            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Kode', 'Kriteria', 'Nilai Kriteria', 'Nilai'],
                    'data' => $data,
                    'mapping' => [
                        '__INCREMENT__',
                        'kode',
                        function ($a) {
                            return $a->kriteria?->nama_kriteria;
                        },
                        'nilai_kriteria',
                        'nilai',
                    ],
                    'actionUpdate' => true,
                    'actionDelete' => false,
                    'actionShow' => false,
                    'aksi' => true,
                ])
            </div>
        </div>

        {{-- modal --}}
        <x-modal :formAction="$formAction" :formMethod="$formMethod" :formData="'components.subkriteria.form'" id="form" :kriteria="$kriteria" />

    </div>
    <script>
        const action = $(this).data('action');
        const modal = $('#interestModal');
        const form = modal.find('form');

        $('.closeModal').on('click', function(e) {
            $('#interestModal').addClass('hidden');
            $('#kode').val('');
            $('#kodekriteria').val('');
            $('#nilaiKriteria').val('');
            $('#nilai').val('');
        });

        function editData(item) {
            modal.find('#titleModal').html('Edit Data');
            modal.find('#btnModal').html('Edit');

            const formAction = '{{ route('sub_kriteria.index') }}/' + item.kode;
            const formMethod = 'POST';

            form.append('<input type="hidden" value="PUT" name="_method"/>');

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form
            modal.find('#kode').val(item.kode);
            modal.find('#kode_kriteria').val(item.kode_kriteria);
            modal.find('#nilai_kriteria').val(item.nilai_kriteria);
            modal.find('#nilai').val(item.nilai);

            // isian form
            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');

            modal.removeClass('hidden');
        }

        function tambahData() {

            modal.find('#titleModal').html('Tambah Data');
            modal.find('#btnModal').html('Tambah');
            form.append('<input type="hidden" value="POST" name="_method"/>');

            const formAction = '{{ route('sub_kriteria.store') }}'
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);
            $('#kode').val('{{ App\Models\NilaiKriteria::generateUniqueKode() }}');

            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');
            modal.removeClass('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            modal.addClass('hidden');
        });
    </script>
@endsection
