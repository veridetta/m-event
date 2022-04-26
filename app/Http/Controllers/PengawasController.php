<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Pengawas;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = Province::all();
        $list_pengawas = Pengawas::all();
        if($request->ajax()){
            return datatables()->of($list_pengawas)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id.'" class="detail btn btn-info btn-sm detail-modal"><i class="fa fa-eye"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;'; 
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('pengawas.index',compact('provinces'));
    }

    public function index2(Request $request)
    {
        $provinces = Province::all();
        $list_pengawas = Pengawas::all();
        if($request->ajax()){
            return datatables()->of($list_pengawas)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id.'" class="detail btn btn-info btn-sm detail-modal"><i class="fa fa-eye"></i> Detail</button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };

    return view('pengawas.detail',compact('provinces'));
    }

    public function getkota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kotas = Regency::where('province_id',$id_provinsi)->get();

        foreach($kotas as $Kota)
        {
            echo "<option value='$Kota->name'>$Kota->name</option>";
        }
    }

    public function pengawas_detail($id) {
        // $post = Piu::findOrFail($id);
        // return view('piu.index', compact('post'));
        return Pengawas::findOrFail($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengawas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provincesName = Province::where('id',$request->Provinsi)->value('name');
        $id = $request->id;
        
        $post   =   Pengawas::updateOrCreate(['id' => $id],
                    [
                        'name' => $request->name,
                        'NoHp' => $request->NoHp,
                        'email' => $request->email,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'Provinsi' => $provincesName,
                        'Kota' => $request->Kota,
                        'password' => bcrypt($request->password),
                        'Status_Aktif' => $request->Status_Aktif,
                        'Created_By' => Auth::user()->id
                    ]); 

        $user = User::create([
            'level_akun_id' => '4' ,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $where =  array('id' => $id);
           $post  = Pengawas::where('id',$id)->first();

    return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $where = array('id' => $id);
            $post  = Pengawas::where($where)->first();
        
            return response()->json($post);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Pengawas::where('id',$id)->delete();
     
        return response()->json($post);

    }
}
