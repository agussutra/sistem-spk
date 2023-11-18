@extends('pages.layout')
@section('content')
    @php
        $formAction = '';
        $formMethod = '';
    @endphp

    <div>
        <div class="mb-4 text-2xl font-bold">
            <p >Kelayakan Pemberian Kredit</p>
        </div>
        <div class="card">
            <a href="{{ route('pdf') }}"
                class="float-right ml-auto mb-5 bg-blue-400 hover:bg-blue-500 p-2 text-sm text-white shadow-md rounded-md"
                id="cetakLaporan">Cetak Laporan</a>
            {{-- list table --}}
            <div>
                <table class="h-full w-full" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Nasabah</th>
                            <th>Nilai</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                            $ranking = 1;
                        @endphp
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $dt->nasabah->nama_nasabah }}</td>
                                <td class="text-right">{{ number_format($dt->value_preferensi, 4, '.', ',') }}</td>
                                <td class="text-center">{{ $ranking ++ }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script></script>
@endsection
