<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->upsert([
            ['id' => 1, 'nama_user' => 'Putu', 'username' => 'admin', 'password' => '$2a$12$thxNc89QmnZ6vj4ZxsByLe4jMbF6RRNAr2IxcWBOUst2FMSWHZXa6', 'jabatan' => 'Admin'],
        ], 'id');

        DB::table('kriteria')->upsert([
            ['kode' => 'K01','nama_kriteria' => 'Riwayat Kredit', 'kriteria' => 'BENEFIT' , 'keterangan' => 'Penilaian ini dapat mencakup informasi mengenai keteraturan dalam membayar kredit sebelumnya dan temuan lain dari wawancara dengan klien yang melakukan pengajuan kredit.'],
            ['kode' => 'K02','nama_kriteria' => 'Pekerjaan', 'kriteria' => 'BENEFIT' , 'keterangan' => 'Faktor-faktor seperti stabilitas pekerjaan, lama bekerja, posisi pekerjaan, dan kualifikasi pendidikan'],
            ['kode' => 'K03','nama_kriteria' => 'Penghasilan', 'kriteria' => 'BENEFIT' , 'keterangan' => 'Kriteria penghasilan berkaitan dengan pendapatan yang diperoleh oleh peminjam'],
            ['kode' => 'K04','nama_kriteria' => 'Nilai Jaminan', 'kriteria' => 'BENEFIT' , 'keterangan' => 'Nilai jaminan ini dapat berupa aset yang dapat dijadikan jaminan,seperti tanah, rumah, mobil, atau surat berharga'],
            ['kode' => 'K05','nama_kriteria' => 'Jangka Waktu', 'kriteria' => 'COST' , 'keterangan' => 'Pada kriteria ini, jangka waktu mengacu pada jangka waktu yang telah ditetapkan untuk melunasi pinjaman atau kredit yang diajukan'],
        ], 'kode');

        DB::table('nilai_kriteria')->upsert([
            [
                'kode_kriteria' => 'K01',
                'kode' => 'K01-1',
                'nilai_kriteria' => 'Kurang',
                'nilai' => 1
            ],
            [
                'kode_kriteria' => 'K01',
                'kode' => 'K01-2',
                'nilai_kriteria' => 'Cukup',
                'nilai' => 3
            ],
            [
                'kode_kriteria' => 'K01',
                'kode' => 'K01-3',
                'nilai_kriteria' => 'Baik',
                'nilai' => 5
            ],
            [
                'kode_kriteria' => 'K02',
                'kode' => 'K02-1',
                'nilai_kriteria' => 'Pekerja Lepas',
                'nilai' => 1
            ],
            [
                'kode_kriteria' => 'K02',
                'kode' => 'K02-2',
                'nilai_kriteria' => 'Wirausaha',
                'nilai' => 3
            ],
            [
                'kode_kriteria' => 'K02',
                'kode' => 'K02-3',
                'nilai_kriteria' => 'PNS',
                'nilai' => 5
            ],
            [
                'kode_kriteria' => 'K03',
                'kode' => 'K03-1',
                'nilai_kriteria' => '< 1.000.000',
                'nilai' => 1
            ],
            [
                'kode_kriteria' => 'K03',
                'kode' => 'K03-2',
                'nilai_kriteria' => '1.000.000 - 20.000.000',
                'nilai' => 3
            ],
            [
                'kode_kriteria' => 'K03',
                'kode' => 'K03-3',
                'nilai_kriteria' => '> 20.000.000',
                'nilai' => 5
            ],
            [
                'kode_kriteria' => 'K04',
                'kode' => 'K04-1',
                'nilai_kriteria' => 'Kendaraan Bermotor',
                'nilai' => 1
            ],
            [
                'kode_kriteria' => 'K04',
                'kode' => 'K04-2',
                'nilai_kriteria' => 'Bangunan',
                'nilai' => 3
            ],
            [
                'kode_kriteria' => 'K04',
                'kode' => 'K04-3',
                'nilai_kriteria' => 'Tanah',
                'nilai' => 5
            ],
            [
                'kode_kriteria' => 'K05',
                'kode' => 'K05-1',
                'nilai_kriteria' => '36',
                'nilai' => 1
            ],
            [
                'kode_kriteria' => 'K05',
                'kode' => 'K05-2',
                'nilai_kriteria' => '24',
                'nilai' => 3
            ],
            [
                'kode_kriteria' => 'K05',
                'kode' => 'K05-3',
                'nilai_kriteria' => '12',
                'nilai' => 5
            ],
        ], 'kode');

        DB::table('nasabah')->upsert([
            [
                'id' => 1,
                'nama_nasabah' => 'I Wayan Sulasmi',
                'jk' => 2,
                'no_hp' => '099288822222',
                'alamat' => 'Jln. Kdongan',
                'pekerjaan' => 'Wira Usaha',
                'created_at' => '2023-11-01'
            ],
            [
                'id' => 2,
                'nama_nasabah' => 'Putu Eka Juliawan',
                'jk' => 1,
                'no_hp' => '0817992922',
                'alamat' => 'Jln. Bdung',
                'pekerjaan' => 'PNS',
                'created_at' => '2023-10-01'
            ],
            [
                'id' => 3,
                'nama_nasabah' => 'I Wayan Arya',
                'jk' => 1,
                'no_hp' => '0828773773773',
                'alamat' => 'Jln. Sumiang',
                'pekerjaan' => 'Pekerja Lepas',
                'created_at' => '2023-09-01'
            ],
            [
                'id' => 4,
                'nama_nasabah' => 'I Wayan Gede Sarjana',
                'jk' => 1,
                'no_hp' => '087288662772',
                'alamat' => 'Jln. Bukittinggi',
                'pekerjaan' => 'PNS',
                'created_at' => '2023-09-01'
            ],
            [
                'id' => 5,
                'nama_nasabah' => 'Eri Kurniasih',
                'jk' => 2,
                'no_hp' => '0828773373',
                'alamat' => 'Jln. Kuta',
                'pekerjaan' => 'Pekerja Lepas',
                'created_at' => '2023-09-01'
            ],
        ], 'id');

        // permohonan
        DB::table('permohonan')->upsert([
            [
                'id' => 1,
                'nasabah_id' => 1,
                'status' => 0,
            ],
            [
                'id' => 2,
                'nasabah_id' => 2,
                'status' => 0,
            ],
            [
                'id' => 3,
                'nasabah_id' => 3,
                'status' => 0,
            ],
            [
                'id' => 4,
                'nasabah_id' => 4,
                'status' => 0,
            ],
            [
                'id' => 5,
                'nasabah_id' => 5,
                'status' => 0,
            ]
        ],'id');

        // truncate
        DB::table('spk')->truncate();

        DB::table('spk')->insert([
            [
                'permohonan_id' => 1,
                'kode_kriteria' => 'K01',
                'kode_nilai_kriteria' => 'K01-3',
            ],
            [
                'permohonan_id' => 1,
                'kode_kriteria' => 'K02',
                'kode_nilai_kriteria' => 'K02-2',
            ],
            [
                'permohonan_id' => 1,
                'kode_kriteria' => 'K03',
                'kode_nilai_kriteria' => 'K03-2',
            ],
            [
                'permohonan_id' => 1,
                'kode_kriteria' => 'K04',
                'kode_nilai_kriteria' => 'K04-1',
            ],
            [
                'permohonan_id' => 1,
                'kode_kriteria' => 'K05',
                'kode_nilai_kriteria' => 'K05-1',
            ],
            [
                'permohonan_id' => 2,
                'kode_kriteria' => 'K01',
                'kode_nilai_kriteria' => 'K01-3',
            ],
            [
                'permohonan_id' => 2,
                'kode_kriteria' => 'K02',
                'kode_nilai_kriteria' => 'K02-3',
            ],
            [
                'permohonan_id' => 2,
                'kode_kriteria' => 'K03',
                'kode_nilai_kriteria' => 'K03-2',
            ],
            [
                'permohonan_id' => 2,
                'kode_kriteria' => 'K04',
                'kode_nilai_kriteria' => 'K04-2',
            ],
            [
                'permohonan_id' => 2,
                'kode_kriteria' => 'K05',
                'kode_nilai_kriteria' => 'K05-2',
            ],
            [
                'permohonan_id' => 3,
                'kode_kriteria' => 'K01',
                'kode_nilai_kriteria' => 'K01-2',
            ],
            [
                'permohonan_id' => 3,
                'kode_kriteria' => 'K02',
                'kode_nilai_kriteria' => 'K02-1',
            ],
            [
                'permohonan_id' => 3,
                'kode_kriteria' => 'K03',
                'kode_nilai_kriteria' => 'K03-1',
            ],
            [
                'permohonan_id' => 3,
                'kode_kriteria' => 'K04',
                'kode_nilai_kriteria' => 'K04-1',
            ],
            [
                'permohonan_id' => 3,
                'kode_kriteria' => 'K05',
                'kode_nilai_kriteria' => 'K05-1',
            ],
            [
                'permohonan_id' => 4,
                'kode_kriteria' => 'K01',
                'kode_nilai_kriteria' => 'K01-3',
            ],
            [
                'permohonan_id' => 4,
                'kode_kriteria' => 'K02',
                'kode_nilai_kriteria' => 'K02-3',
            ],
            [
                'permohonan_id' => 4,
                'kode_kriteria' => 'K03',
                'kode_nilai_kriteria' => 'K03-2',
            ],
            [
                'permohonan_id' => 4,
                'kode_kriteria' => 'K04',
                'kode_nilai_kriteria' => 'K04-3',
            ],
            [
                'permohonan_id' => 4,
                'kode_kriteria' => 'K05',
                'kode_nilai_kriteria' => 'K05-2',
            ],
            [
                'permohonan_id' => 5,
                'kode_kriteria' => 'K01',
                'kode_nilai_kriteria' => 'K01-2',
            ],
            [
                'permohonan_id' => 5,
                'kode_kriteria' => 'K02',
                'kode_nilai_kriteria' => 'K02-1',
            ],
            [
                'permohonan_id' => 5,
                'kode_kriteria' => 'K03',
                'kode_nilai_kriteria' => 'K03-1',
            ],
            [
                'permohonan_id' => 5,
                'kode_kriteria' => 'K04',
                'kode_nilai_kriteria' => 'K04-1',
            ],
            [
                'permohonan_id' => 5,
                'kode_kriteria' => 'K05',
                'kode_nilai_kriteria' => 'K05-1',
            ],
        ]);


    }
}
