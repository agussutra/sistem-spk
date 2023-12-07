<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\PerhitunganAhp;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $nilaiPeminjaman = PerhitunganAhp::sum('nominal_peminjaman');
        $jumlahNasabah = Nasabah::count();
        $jumlahPermohonan = PerhitunganAhp::count();

        $grafikKredit = Nasabah::select(DB::raw('count(*) as jumlah'), DB::raw('DATE_FORMAT(created_at, "%m") as month_year'))
            ->groupBy('month_year')
            ->get();

        return view('pages.master.dashboard', compact('nilaiPeminjaman','jumlahNasabah','jumlahPermohonan', 'grafikKredit'));
    }
}
