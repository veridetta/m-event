<?php

namespace App\Http\Controllers;

use App\Models\Narasumber;
use App\Models\KategoriNarasumber;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NarasumberController extends Controller
{
   
    public function index(Request $request)
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        $kategoris = KategoriNarasumber::all();
        
      
        $list_kategori = kategorinarasumber::all();
        $list_narasumber = Narasumber::all();
        $narasumber_kategori = Narasumber::with('kategori_narasumber')->get();
        // dd($list_narasumber);
        
        if($request->ajax()){
            return datatables()->of($list_narasumber,$narasumber_kategori)
                        ->addColumn('action', function($data){
                            $button  =  '<button type="button" name="detail" data-id="'.$data->id.'" data-original-title="Detail" class="show btn btn-info btn-xs mr-1 detail-narasumber"><i class="fa fa-eye detail-modal"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs delete-data"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('narasumber.index',['provinces'=>$provinces,'list_narasumber'=>$list_narasumber,'kategoris'=>$kategoris,]);
    }

    public function index5(Request $request)
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        $kategoris = KategoriNarasumber::all();
        
      
        $list_kategori = kategorinarasumber::all();
        $list_narasumber = Narasumber::all();
        $narasumber_kategori = Narasumber::with('kategori_narasumber')->get();
        // dd($list_narasumber);
        
        if($request->ajax()){
            return datatables()->of($list_narasumber,$narasumber_kategori)
                        ->addColumn('action', function($data){
                            $button  =  '<button type="button" name="detail" data-id="'.$data->id.'" data-original-title="Detail" class="show btn btn-info btn-xs mr-1 detail-narasumber"><i class="fa fa-eye detail-modal"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;';
                            // $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            // $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs delete-data"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('narasumber.show',['provinces'=>$provinces,'list_narasumber'=>$list_narasumber,'kategoris'=>$kategoris,]);
    }

    public function getkota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kotas = Regency::where('province_id',$id_provinsi)->get();

        foreach($kotas as $Kota)
        {
            echo "<option value='$Kota->id'>$Kota->name</option>";
        }
    }

    public function getkategori(Request $request)
    {
        $id_kategori = $request->id_kategori;
    }

    public function store(Request $request)
    {

        
        // dd($request->input());
        // input nama provinsi dari id provinsi
        $provincesName = Province::where('id',$request->provinsi)->value('name');

        // input kategori narasumber berdasar dari id kategori narasumber
        $kategoriName = KategoriNarasumber::where('id_kategori',$request->id_kategori_narasumber)
                                            ->value('kategori');

        $id = $request->id;
        $post   =   narasumber::updateOrCreate(['id' => $id],
                    [
                        'nama' => $request->nama,
                        'id_kategori_narasumber' => $request->id_kategori_narasumber,
                        'nama_kategori_narasumber' => $kategoriName,
                        'nomorhp' => $request->nomorhp,
                        'email' => $request->email,
                        'jk'=> $request->jk,
                        'pendidikan'=> $request->pendidikan,
                        'pekerjaan' => $request->pekerjaan,
                        'kota' => $request->kota,
                        'provinsi' => $provincesName,
                        'created_by' => Auth::user()->id,
                    ]); 

        return response()->json($post);
    }

   public function show($id)
    {
        $where =  array('id' => $id);
            $post  = narasumber::where('id',$id)->first();
    
        return response()->json($post);
    }

    
    public function edit($id)
    {
            $where = array('id' => $id);
            $post  = narasumber::where($where)->first();
            $narasumber = Narasumber::get()->load('kategori_narasumber');
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = narasumber::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
