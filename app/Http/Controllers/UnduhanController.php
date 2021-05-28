<?php

namespace App\Http\Controllers;

use App\Unduhan;
use Illuminate\Http\Request;

class UnduhanController extends Controller
{
    public function index(Request $request)
    {
        $unduhan = Unduhan::all();
        if($request->ajax()){
            return datatables()->of($unduhan)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm"></i></button>'; 
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    
            return view('admin.unduhan.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   Unduhan::updateOrCreate(['id' => $id],
                    [
                        'nama_file' => $request->nama_file,
                        'filepath' => $request->filepath,
                    ]); 

        return response()->json($post);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Unduhan::where($where)->first();
     
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Unduhan::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
