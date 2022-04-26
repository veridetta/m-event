<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;
use App\Models\kategori_pertanyaan;
use App\Models\PelaporanPersiapan;
use App\Models\PertanyaanPersiapan;

class PertanyaanPersiapanController extends Controller
{
    public function index(Request $request)
    {
        $kategori = kategori_pertanyaan::all();
        $kegiatan = kegiatan::all();
        $list_pertanyaan = PertanyaanPersiapan::all();
        
        if($request->ajax()){
            return datatables()->of($list_pertanyaan)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id.'" class="detail btn btn-info detail-modal"><i class="fa fa-eye"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;'; 
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('pertanyaan.persiapan', compact('kategori','kegiatan','list_pertanyaan'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        
        $namaKegiatan = kegiatan::where('id_kegiatan',$request->kegiatan)->value('namakegiatan');

        $post   =   PertanyaanPersiapan::updateOrCreate(['id' => $id],
                    [
                        'kegiatan' => $namaKegiatan,
                        'pertanyaan1' => $request->pertanyaan1,
                        'pertanyaan2' => $request->pertanyaan2,
                        'pertanyaan3' => $request->pertanyaan3,
                        'pertanyaan4' => $request->pertanyaan4,
                        'pertanyaan5' => $request->pertanyaan5,
                        'pertanyaan6' => $request->pertanyaan6,
                        'pertanyaan7' => $request->pertanyaan7,
                        'pertanyaan8' => $request->pertanyaan8,
                        'pertanyaan9' => $request->pertanyaan9,
                        'pertanyaan10' => $request->pertanyaan10,
                        'kategori1' => $request->kategori1,
                        'kategori2' => $request->kategori2,
                        'kategori3' => $request->kategori3,
                        'kategori4' => $request->kategori4,
                        'kategori5' => $request->kategori5,
                        'kategori6' => $request->kategori6,
                        'kategori7' => $request->kategori7,
                        'kategori8' => $request->kategori8,
                        'kategori9' => $request->kategori9,
                        'kategori10' => $request->kategori10,
                    ]);

                    $pelaporan = PelaporanPersiapan::create([
                        'kegiatan' => $namaKegiatan,
                        'pertanyaan1' => $request->pertanyaan1,
                        'pertanyaan2' => $request->pertanyaan2,
                        'pertanyaan3' => $request->pertanyaan3,
                        'pertanyaan4' => $request->pertanyaan4,
                        'pertanyaan5' => $request->pertanyaan5,
                        'pertanyaan6' => $request->pertanyaan6,
                        'pertanyaan7' => $request->pertanyaan7,
                        'pertanyaan8' => $request->pertanyaan8,
                        'pertanyaan9' => $request->pertanyaan9,
                        'pertanyaan10' => $request->pertanyaan10,
                        'kategori1' => $request->kategori1,
                        'kategori2' => $request->kategori2,
                        'kategori3' => $request->kategori3,
                        'kategori4' => $request->kategori4,
                        'kategori5' => $request->kategori5,
                        'kategori6' => $request->kategori6,
                        'kategori7' => $request->kategori7,
                        'kategori8' => $request->kategori8,
                        'kategori9' => $request->kategori9,
                        'kategori10' => $request->kategori10,
                    ]);
        return response()->json($post);
    }

    public function show($id)
    {
        $where =  array('id' => $id);
           $post  = PertanyaanPersiapan::where('id',$id)->first();

    return response()->json($post);
    }

    public function edit($id)
    {
    $where = array('id' => $id);
            $post  = PertanyaanPersiapan::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = PertanyaanPersiapan::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
