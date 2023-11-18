<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Helper\SPK::spk();
        return view('pages.master.laporan.list_laporan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pdf()
    {
        $data = \App\Helper\SPK::spk()->toArray();

        $pdf = PDF::loadView('pages.master.laporan.pdf',compact('data'));
        return $pdf->download('laporan.pdf');
        
        
    }
}
