<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserEo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEOController extends Controller
{
    public function index(Request $request)
    {
        $list_usereo = usereo::all();
        if($request->ajax()){
            return datatables()->of($list_usereo)
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
    return view('usereo.index');
    }

    public function index3(Request $request)
    {
        $list_usereo = usereo::all();
        if($request->ajax()){
            return datatables()->of($list_usereo)
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
    return view('usereo.show');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   usereo::updateOrCreate(['id' => $id],
                    [
                        'name' => $request->name,
                        'nomorhp' => $request->nomorhp,
                        'email' => $request->email,
                        'password' => bcrypt ($request->password),
                        'created_by' => Auth::user()->id,
                    ]); 

        $user = User::create([
            'level_akun_id' => '3' ,
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
            $post  = usereo::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = usereo::where('id',$id)->delete();
     
        return response()->json($post);
    }
}