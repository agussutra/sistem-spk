@extends('pages.layout')
@section('content')
<!-- Content -->
<div class="mt-1">
    <!-- State cards -->
    <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-3">
        <!-- Value card -->
        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-white uppercase dark:text-primary-light">
                    Nilai Peminjaman
                </h6>
                <span class="text-xl font-semibold text-white">{{ $nilaiPeminjaman }}</span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Users card -->
        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-400 to-yellow-300 rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-white uppercase dark:text-primary-light">
                    Nasabah
                </h6>
                <span class="text-xl font-semibold text-white">{{ $jumlahNasabah }}</span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Orders card -->
        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-400 to-pink-400 rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-white uppercase dark:text-primary-light">
                    Data SPK
                </h6>
                <span class="text-xl font-semibold text-white">{{ $jumlahPermohonan }}</span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <div class="w-full bg-white p-3 rounded-md shadow-md mt-4">
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
            </p>
        </figure>
    </div>
</div>
<script>
    const chart = Highcharts.chart('container', {
    title: {
        text: 'Grafik Peningkatan Jumlah Nasabah Kredit',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    colors: [
        '#4caefe',
        '#3fbdf3',
        '#35c3e8',
        '#2bc9dc',
        '#20cfe1',
        '#16d4e6',
        '#0dd9db',
        '#03dfd0',
        '#00e4c5',
        '#00e9ba',
        '#00eeaf',
        '#23e274'
    ],
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    series: [{
        type: 'column',
        name: 'Jumlah',
        borderRadius: 5,
        colorByPoint: true,
        data: [5412, 4977, 4730, 4437, 3947, 3707, 4143, 3609,
            3311, 3072, 2899, 2887],
        showInLegend: false
    }]
});

document.getElementById('plain').addEventListener('click', () => {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: ''
        }
    });
});

document.getElementById('inverted').addEventListener('click', () => {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: ''
        }
    });
});

</script>
@endsection