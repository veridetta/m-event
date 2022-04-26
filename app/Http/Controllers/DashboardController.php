<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kegiatan = Kegiatan::all();

        // $kegiatan = \DB::table('kegiatan')->select([
        //     \DB::raw('DATE(waktu) as tanggal'),
        //     \DB::raw('namakegiatan as nama')
        // ])->groupBy('tanggal')->whereRaw('DATE(waktu) >= ? ',[date('Y-m-d',strtotime('-30 days'))])->get()->toArray();

        $kegiatans = DB::table('kegiatan')->select([
            DB::raw('count(*) as jumlah'),
            DB::raw('EXTRACT(MONTH from waktu) as bulan')
        ])->groupBy('bulan')->get()->toArray();

        $target = DB::table('kegiatan')
            ->select('target')
            ->get();

        $jalan = DB::table('kegiatan')->where('status', '=', 'Berjalan')
             ->count();
        $selesai = DB::table('kegiatan')->where('status', '=', 'Selesai')
             ->count();
        $tunda = DB::table('kegiatan')->where('status', '=', 'Tertunda')
             ->count();
        $total = DB::table('kegiatan')->count();
        //dd($stat);

        //data chart
        $categories = [];
        $data = [];
        $target = [];

        foreach($kegiatans as $event){
            // $categories[] = $event->bulan;
            $data[] = $event->jumlah;
        }

        foreach($kegiatan as $events){
            $categories[] = $events->namakegiatan;
            $target[] = $events->target;
        }

        // dd($target);

        return view('home',['categories' => $categories, 'data' => $data, 'target' => $target, 'jalan' => $jalan, 'selesai' => $selesai, 'tunda' => $tunda, 'total' => $total]);
    }
}
