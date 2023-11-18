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
                <button type="button" class="btn-create openModal" id="createBtn" onclick="tambahData()">Tambah</button>
            </div>
            <hr class="mb-2">
            {{-- list table --}}
            <div>
                <table class="h-full w-full" id="table">
                    <thead>
                        <tr>
                            <th rowspan="2">Nasabah</th>
                            <th rowspan="2">Nominal</th>
                            <th rowspan="2">Status</th>
                            <th colspan="5">AHP</th>
                            <th rowspan="2">Ranking</th>
                        </tr>
                        <tr>

                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $item->nasabah?->nama_nasabah }}</td>
                                <td>{{ $item->nominal_peminjaman }}</td>
                                <td>
                                    <button onclick="return updateStatus('{{ $item->id }}','{{ $item->status }}');"
                                        class="p-1 {{ $item->status == 0 ? 'bg-yellow-400' : ($item->status == 1 ? 'bg-green-600' : 'bg-red-600') }}  rounded-md text-white font-semibold">
                                        {{ $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Diterima' : 'Ditolak') }}
                                    </button>
                                </td>
                                @foreach ($item->spk as $ahp)
                                    <td>{{ \App\Helper\SPK::AHP[$ahp->kode_kriteria][$ahp->kode_nilai_kriteria] }}</td>
                                @endforeach
                                <td>{{ number_format($item->value_preferensi, 4, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- modal --}}
        <x-modal :formAction="$formAction" :formMethod="$formMethod" :formData="'components.perhitunganAhp.form'" id="form" :nasabah="$nasabah" />

    </div>
    <script>
        const action = $(this).data('action');
        const modal = $('#interestModal');
        const form = modal.find('form');
        var daftarSpkData = document.getElementById('daftarSpkData');

        $('.closeModal').on('click', function(e) {
            $('#interestModal').addClass('hidden');
            $('#nasabah_id').val('');
            $('#status').val('');
            $('#nominal_peminjaman').val('');
            $('#idkriteria').val('');
            $('#updateStatus').val('');

            daftarSpkData.innerHTML = '';
        });

        function editData(item) {
            modal.find('#titleModal').html('Edit Data');
            modal.find('#btnModal').html('Edit');

            const formAction = '{{ route('perhitungan_ahp.index') }}/' + item.id;
            const formMethod = 'POST';

            form.append('<input type="hidden" value="PUT" name="_method"/>');

            form.attr('action', formAction);
            form.attr('method', formMethod);

            // isian form
            modal.find('#nasabah_id').val(item.nasabah_id);
            modal.find('#status').val(item.status);
            modal.find('#nominal_peminjaman').val(item.nominal_peminjaman);

            item.spk_data.forEach(spk => {
                modal.find('select[name="kriteria[' + spk.kode_kriteria + ']"]').val(spk.kode_nilai_kriteria)
                    .change()
            })

            // isian form
            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');
            var button = document.getElementById('btnModal');
            button.classList.remove('hidden');
            modal.removeClass('hidden');
        }

        function tambahData() {

            modal.find('#titleModal').html('Tambah Data');
            modal.find('#btnModal').html('Tambah');
            form.append('<input type="hidden" value="POST" name="_method"/>');

            const formAction = '{{ route('perhitungan_ahp.store') }}'
            const formMethod = 'POST';

            form.attr('action', formAction);
            form.attr('method', formMethod);

            $('#form-modal').removeClass('hidden');
            $('#form-modal-read').addClass('hidden');
            modal.removeClass('hidden');
            var button = document.getElementById('btnModal');
            button.classList.removeClass('hidden');
        }

        function showData(item) {
            modal.find('#titleModal').html('Detail Data');
            var button = document.getElementById('btnModal');
            button.classList.add('hidden');


            // isian form
            modal.find('.namaNasabah').html(item.nasabah.nama_nasabah);
            modal.find('.status').html(item.status ? 'Pending' : 'Approve');
            modal.find('.nominal').html(item.nominal_peminjaman);

            item.spk_data.forEach(spk => {
                var listItem = document.createElement('li');
                listItem.textContent = spk.kriteria.nama_kriteria + ' : ' + spk.nilai_kriteria.nilai_kriteria;
                daftarSpkData.appendChild(listItem);
            });

            // isian form
            $('#form-modal').addClass('hidden');
            $('#form-modal-read').removeClass('hidden');

            modal.removeClass('hidden');
        }

        function updateStatus(id, status) {

            var Valuestatus = parseInt(status) + 1;

            if (Valuestatus < 3) {
                const formAction = '{{ route('perhitungan_ahp.index') }}/' + id;
                const formMethod = 'POST';

                form.append('<input type="hidden" value="PUT" name="_method"/>');

                form.attr('action', formAction);
                form.attr('method', formMethod);

                modal.find('#updateStatus').val(Valuestatus);
                document.getElementById('formModal').submit();
            }

        }



        document.addEventListener('DOMContentLoaded', function() {
            modal.addClass('hidden');
        });
    </script>
@endsection
