<?php

namespace App\Http\Controllers;

use App\Models\Eo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;

class EoController extends Controller
{
    public function index(Request $request)
    {
        $list_eo = eo::all();
        if($request->ajax()){
            return datatables()->of($list_eo)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('eo.index');
    }

    public function index7(Request $request)
    {
        $list_eo = eo::all();
        if($request->ajax()){
            return datatables()->of($list_eo)
                        ->addColumn('action', function($data){
                            // $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Ubah</a>';
                            // $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Hapus</button>';     
                            // return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('eo.show');
    }


    public function index2(Request $request)
    {
        $list_eo = eo::all();
        if($request->ajax()){
            return datatables()->of($list_eo)->make(true);
        };
    return view('eo.detail');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   eo::updateOrCreate(['id' => $id],
                    [
                        'name' => $request->name,
                        'nomorhp' => $request->nomorhp,
                        'alamat' => $request->alamat,
                        'email' => $request->email,
                        'password' => bcrypt ($request->password),
                        'created_by' => Auth::user()->id,
                    ]); 

        $user = User::create([
            'level_akun_id' => '2' ,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response()->json($post);
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
    $where = array('id' => $id);
            $post  = eo::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = eo::where('id',$id)->delete();
     
        return response()->json($post);
    }
}