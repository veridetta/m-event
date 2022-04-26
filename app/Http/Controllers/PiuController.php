<?php

namespace App\Http\Controllers;

use App\Models\Piu;
use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PiuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = Province::all();
        $Kota = Regency::all();
        $list_piu = Piu::all();
        if($request->ajax()){
            return datatables()->of($list_piu)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id.'" class="detail btn btn-info btn-sm detail-modal"><i class="fa fa-eye"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;'; 
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('piu.index',compact('provinces','Kota','list_piu'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('piu.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $provincesName = Province::where('id',$request->Provinsi)->value('name');
        
        $post   =   Piu::updateOrCreate(['id' => $id],
                    [
                        'user_id' => $request->user_id,
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
            'id' => $request->user_id,
            'level_akun_id' => '5' ,
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
           $post  = Piu::where('id',$id)->first();

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
        $provinces = Province::all();
        $Kota = Regency::all();
        $where = array('id' => $id);
        $post  = Piu::where($where)->first();
    
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
        $post = Piu::where('id',$id)->delete();
     
        return response()->json($post);
    }
}