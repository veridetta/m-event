<?php

namespace App\Http\Controllers;

use App\Models\KategoriNarasumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriNarasumberController extends Controller
{
    public function index(Request $request)
    {
        
        $list_kategori = kategorinarasumber::all();
        
        if($request->ajax()){
            return datatables()->of($list_kategori)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kategori.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                            // $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_kategori.'" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('kategorinarasumber.index');
    }

    public function index4(Request $request)
    {
        
        $list_kategori = kategorinarasumber::all();
        
        if($request->ajax()){
            return datatables()->of($list_kategori)
                        ->addColumn('action', function($data){
                            // $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kategori.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            // $button .= '&nbsp;&nbsp;';
                            // // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                            // // $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="delete" id="'.$data->id_kategori.'" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            // return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('kategorinarasumber.show');
    }

    public function store(Request $request)
    {
        $id = $request->id_kategori;
        
        $post   =   kategorinarasumber::updateOrCreate(['id_kategori' => $id],
                    [
                        'kategori'=> $request->kategori,
                        'created_by' => Auth::user()->id,
                        
                    ]); 

        return response()->json($post);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
    $where = array('id_kategori' => $id);
            $post  = kategorinarasumber::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = kategorinarasumber::where('id_kategori',$id)->delete();
    
        return response()->json($post);
    }
}