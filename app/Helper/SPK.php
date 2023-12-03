<?php

namespace App\Helper;

use App\Models\PerhitunganAhp;
use App\Models\Permohonan;
use Illuminate\Support\Facades\DB;


class SPK
{

    const W = [0.351, 0.351, 0.173, 0.062, 0.059];
    const AHP = [
        'K01' => [
            'K01-1' => 0.037,
            'K01-2' => 0.091,
            'K01-3' => 0.222,
        ],
        'K02' => [
            'K02-1' => 0.099,
            'K02-2' => 0.042,
            'K02-3' => 0.209,
        ],
        'K03' => [
            'K03-1' => 0.012,
            'K03-2' => 0.048,
            'K03-3' => 0.111,
        ],
        'K04' => [
            'K04-1' => 0.006,
            'K04-2' => 0.016,
            'K04-3' => 0.039,
        ],
        'K05' => [
            'K05-1' => 0.006,
            'K05-2' => 0.015,
            'K05-3' => 0.037,
        ]
    ];

    public function data()
    {
        return Permohonan::all();
    }

    static function spk()
    {

        $temporary_data = collect();

        (new static)->data()->each(function ($permohonan) use ($temporary_data) {
            $temporary_data->put(
                $permohonan->id,
                $permohonan->spk->pluck('nilai.kode')->toArray()
            );
        });

        $matriks_keputusan_ternormalisasi = collect([]);
        
        $temporary_data->each(function ($item, $key) use ($matriks_keputusan_ternormalisasi, $temporary_data) {

            $res = [];

            foreach ($item as $index => $value) {

                // $pembagi = $temporary_data->toArray();
                // $pow_pembagi = 0;
                // foreach ($pembagi as $pem) {
                //     $pow_pembagi += pow($pem[$index], 2);
                // }

                // $sqrt_pembagi = sqrt($pow_pembagi);

                // $res[$index] = $value / $sqrt_pembagi;
                $k = explode('-', $value)[0];
                $res[$index] = self::AHP[$k][$value];
            }

            $matriks_keputusan_ternormalisasi->put($key, $res);
        });

        // matriks normaliasai terbobot
        $matriks_normlaisasi_terbobot = collect($matriks_keputusan_ternormalisasi)->map(function ($value) {
            return collect($value)->map(function ($value, $index) {
                return $value * self::W[$index];
            })->toArray();
        });
        
        $group_kriteria = [];
        foreach ($matriks_normlaisasi_terbobot as $value) {
            foreach ($value as $i => $v) {
                $group_kriteria[$i][] = $v;
            }
        }

        // solusi ideal positif
        $solusi_ideal_positif = collect($group_kriteria)->map(function ($value) {
            return max($value);
        })->toArray();
        // solusi ideal negatif
        $solusi_ideal_negatif = collect($group_kriteria)->map(function ($value) {
            return min($value);
        })->toArray();    

        $jarak_alternatif_positif = collect($group_kriteria)->map(function ($data) use ($solusi_ideal_positif) {
            return collect($data)->map(function ($value, $key) use ($solusi_ideal_positif){
                return pow(($solusi_ideal_positif[$key] - $value),2); 
            });
        })->toArray();

        $jarak_alternatif_negatif = collect($group_kriteria)->map(function ($data) use ($solusi_ideal_negatif){
            return collect($data)->map(function ($value, $key) use ($solusi_ideal_negatif){
                return pow(($solusi_ideal_negatif[$key] - $value),2);
            });
        })->toArray();

        $alternatif_solusi_ideal_positif = collect($jarak_alternatif_positif)->map(function ($value){
            return sqrt(array_sum($value));
        })->toArray();

        $alternatif_solusi_ideal_negatif = collect($jarak_alternatif_negatif)->map(function ($value){
            return sqrt(array_sum($value));
        })->toArray();

        $nilai_preferensi = array_map(function ($alternatif_solusi_ideal_positif, $alternatif_solusi_ideal_negatif) {
            return [
                'value_preferensi' => ($alternatif_solusi_ideal_negatif / ($alternatif_solusi_ideal_positif + $alternatif_solusi_ideal_negatif)),

            ]; 
        }, $alternatif_solusi_ideal_positif, $alternatif_solusi_ideal_negatif);

        $ranking = collect($nilai_preferensi)->map(function ($preferensi, $permohonan) {
            $permohonan = PerhitunganAhp::with(['nasabah'])->find($permohonan +1);
            $permohonan->value_preferensi = $preferensi['value_preferensi'];
            return $permohonan;
        })->sortBy([
            ['approve' , 'desc'],
            ['value_preferensi', 'desc']
        ]);
        

        return $ranking;
    }
    
}
