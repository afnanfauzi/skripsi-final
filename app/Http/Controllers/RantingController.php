<?php

namespace App\Http\Controllers;

use App\Ranting;
use App\Anggota;
use App\Cabang;
use Illuminate\Http\Request;

class RantingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ranting = Ranting::with('cabang')->get();
        $anggota = Anggota::where('jabatan_id', '=', 1)->get();
        $cabang = Cabang::all();
    


        if($request->ajax()){
            return datatables()->of($ranting)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm" style="padding:6px"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm" style="padding:6px"></i></button>';                               
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    
        return view('admin.ranting.index', compact('anggota', 'cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        
        $post   =   Ranting::updateOrCreate(['id' => $id],
                    [
                        'nama_ranting' => $request->nama_ranting,
                        'anggota_id' => $request->anggota_id,
                        'jmlh_anggota' => $request->jmlh_anggota,
                        'status_ranting' => $request->status_ranting,
                        'cabang_id' => $request->cabang_id,
                        
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
        //
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
        $post  = Ranting::where($where)->first();

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Ranting::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
