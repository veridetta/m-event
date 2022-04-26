<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;
use App\Models\kategori_pertanyaan;
use App\Models\PelaporanPelaksanaan;
use Illuminate\Support\Facades\Auth;
use App\Models\PertanyaanPelaksanaan;
use Illuminate\Support\Facades\Validator;

class PelaporanPelaksanaanController extends Controller
{
    public function index(Request $request)
    {
        $list_pelaporan = PelaporanPelaksanaan::all();
        $kategori = kategori_pertanyaan::all();
        $kegiatan = kegiatan::all();
        $pertanyaans = PertanyaanPelaksanaan::all();
        if($request->ajax()){
            return datatables()->of($list_pelaporan)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-primary edit-post"><i class="fa fa-plus"></i> Pelaporan</a>';
                            $button .= '&nbsp;&nbsp;'; 
                            $button .= '<button type="button" name="detail" data-toggle="tooltip" name="detail" data-id="'.$data->id.'" class="detail btn btn-info detail-modal"><i class="fa fa-eye"></i> Detail</button>';
                            $button .= '&nbsp;&nbsp;'; 
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };
    return view('pelaporan.pelaksanaan', compact('kategori','kegiatan','list_pelaporan', 'pertanyaans'));
    }

    public function uploadFile1(Request $request){
        
        $data = array();

        $validator = Validator::make($request->all(),[
            'jawaban'=> 'required|mimes:png,jpg,jpeg|max:3000'
        ]);

        if ($validator->fails()){
            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('jawaban');
        }else{
            if ($request->file('jawaban')){
                $file = $request->file('jawaban');
                $filename = time()."_".$file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                //uploaded location
                $location = "pelaporan/files";

                //uploaded file
                $file->move($location, $filename);

                //file path
                $filepath = url('pelaporan/files/'.$filename);

                //response
                $data['success'] = 1;
                $data['message'] = "Uploaded Successfully.";
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;

            }else{
                $data['success'] = 2;
                $data['message'] = "File not uploaded.";
            }
        }

        return response()->json($data);
    }

    public function uploadFile2(Request $request){
        
        $data = array();

        $validator = Validator::make($request->all(),[
            'jawaban'=> 'required|mimes:png,jpg,jpeg|max:3000'
        ]);

        if ($validator->fails()){
            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('jawaban2');
        }else{
            if ($request->file('jawaban2')){
                $file2 = $request->file('jawaban2');
                $filename = time()."_".$file2->getClientOriginalName();

                $extension = $file2->getClientOriginalExtension();

                //uploaded location
                $location = "pelaporan/files";

                //uploaded file
                $file2->move($location, $filename);

                //file path
                $filepath = url('pelaporan/files/'.$filename);

                //response
                $data['success'] = 1;
                $data['message'] = "Uploaded Successfully.";
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;

            }else{
                $data['success'] = 2;
                $data['message'] = "File not uploaded.";
            }
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        // request file image banner
        $file = $request->file('jawaban');
        $file2 = $request->file('jawaban2');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        $filename2 = $file2->getClientOriginalName();
        $extension = $file2->getClientOriginalExtension();

        //uploaded location
        $location = "pelaporan/files";

        //uploaded file
        $file->move($location, $request->kegiatan.'-'.$filename);
        $file2->move($location, $request->kegiatan.'-'.$filename2);

        //file path
        $filepath = url('pelaporan/files/'.$filename);
        $filepath2 = url('pelaporan/files/'.$filename2);

        $id = $request->id;
        $post   =   PelaporanPelaksanaan::updateOrCreate(['id' => $id],
                    [
                        'kegiatan' => $request->kegiatan,
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
                        'jawaban' => $request->kegiatan.'-'.$filename,
                        'jawaban2' => $request->kegiatan.'-'.$filename2,
                        'jawaban3' => $request->jawaban3,
                        'jawaban4' => $request->jawaban4,
                        'jawaban5' => $request->jawaban5,
                        'jawaban6' => $request->jawaban6,
                        'jawaban7' => $request->jawaban7,
                        'jawaban8' => $request->jawaban8,
                        'jawaban9' => $request->jawaban9,
                        'jawaban10' => $request->jawaban10,
                        'Created_By' => Auth::user()->id
                    ]); 

            
        
        return response()->json($post);
    }

    public function show($id)
    {
        $where =  array('id' => $id);
        $post  = PelaporanPelaksanaan::where('id',$id)->first();

    return response()->json($post);
    }

    public function edit($id)
    {
            $where = array('id' => $id);
            $post  = PelaporanPelaksanaan::where($where)->first();
        
            return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = PelaporanPelaksanaan::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
