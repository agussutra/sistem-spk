<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: black;
            text-align: center
        }
        p {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="mb-4 text-center font-bold text-xl">
        <h1 class="text-center">Kelayakan Pemberian Kredit</h1>
    </div>
    <div>
        <table class="h-full w-full">
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
                        <td class="w-7 bg-black">{{ $i++ }}</td>
                        <td>{{ $dt['nasabah']['nama_nasabah'] }}</td>
                        <td class="text-right">{{ number_format($dt['value_preferensi'], 4, '.', ',') }}</td>
                        <td class="text-center">{{ $ranking ++ }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>