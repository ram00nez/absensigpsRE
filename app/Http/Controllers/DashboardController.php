<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $bulanini = date("m") * 1;
        $tahunini = date("Y");
        $nik = Auth::guard('karyawan')->user()->nik;
        $absensihariini = DB::table('absensi')->where('nik',$nik)->where('tgl_absen',$hariini)->first();
        $namabulan = ["","Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $historibulanini = DB::table('absensi')
            ->where('nik',$nik)
            ->whereRaw('MONTH(tgl_absen)="'. $bulanini . '"')
            ->whereRaw('YEAR(tgl_absen)="'. $tahunini . '"')
            ->orderBy('tgl_absen')
            -> get();
        $rekapabsensi = DB::table('absensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "07:00",1,0)) as jmlterlambat')
            ->where('nik',$nik)
            ->whereRaw('MONTH(tgl_absen)="'. $bulanini . '"')
            ->whereRaw('YEAR(tgl_absen)="'. $tahunini . '"')
            ->first();
        $leaderboard = DB::table('absensi')
            ->join('karyawan','absensi.nik','=','karyawan.nik')
            ->where('tgl_absen', $hariini)
            ->orderBy('jam_in')
            ->get();
        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin,SUM(IF(status="s",1,0)) as jmlsakit')
            ->where('nik',$nik)
            ->whereRaw('MONTH(tgl_izin)="'. $bulanini . '"')
            ->whereRaw('YEAR(tgl_izin)="'. $tahunini . '"')
            ->where('status_approved',1)
            ->first();
        return view('dashboard.dashboard',compact('absensihariini','historibulanini','namabulan','bulanini','tahunini',
                    'rekapabsensi','leaderboard','rekapizin'));
    }

    public function dashboardadmin()
    {   
        $hariini = date("Y-m-d");
        $rekapabsensi = DB::table('absensi')
            ->selectRaw('COUNT(nik) as jmlhadir,SUM(IF(jam_in > "07:00",1,0)) as jmlterlambat')
            ->where('tgl_absen', $hariini)
            ->first();

        $rekapizin = DB::table('pengajuan_izin')
        ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin,SUM(IF(status="s",1,0)) as jmlsakit')
        ->where('tgl_izin', $hariini)
        ->where('status_approved',1)
        ->first();
        return view('dashboard.dashboardadmin',compact('rekapabsensi','rekapizin'));
    }


}
