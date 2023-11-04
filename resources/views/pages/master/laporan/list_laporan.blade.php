@extends('pages.layout')
@section('content')
@php
    $formAction = '';
    $formMethod = '';
@endphp

    <div>
        <div class="mb-4 text-2xl font-bold">
            <p>Kelayakan Pemberian Kredit</p>
        </div>
        <div class="card">
            <button type="button" class="float-right ml-auto mb-5 bg-blue-400 hover:bg-blue-500 p-2 text-sm text-white shadow-md rounded-md" id="cetakLaporan">Cetak Laporan</button>
            {{-- list table --}}
            <div>
                @include('components.table', [
                    'headers' => ['No', 'Alternatif', 'Nama Nasabah', 'Total Nilai','Keterangan','Ranking'],
                    'data' => [['id' => '123', 'alternatif' => 'A01', 'nama_nasabah' => 'laksmi', 'total_nilai' => '0,26', 'keterangan' => 'Layak', 'ranking' => '1']],
                    'mapping' => ['__INCREMENT__', 'alternatif', 'nama_nasabah', 'total_nilai','keterangan','ranking'],
                    'actionUpdate' => true,
                    'actionDelete' => true,
                    'aksi' => false,
                ])
            </div>
        </div>
    </div>
    <script>
        
    </script>
@endsection
