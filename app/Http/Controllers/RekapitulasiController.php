<?php

namespace App\Http\Controllers;

use App\Models\Eo;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $eo = Eo::all();
        
    return view('rekapitulasi.index',compact('eo'));
    }
}
