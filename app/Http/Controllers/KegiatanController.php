<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Unit;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{

    

    public function index(Request $request)
    {
    
    $kegiatan = Kegiatan::with('units')->get();
    if($request->ajax()){
        return datatables()->of($kegiatan)
                    ->addColumn('action', function($data){
                        $button = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$data->id.'" title="Lihat Detail Kegiatan" class="open-info btn btn-info"><i class="fa fa-info fa-sm"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="kegiatan/'.$data->id.'/edit" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm" style="padding:6px"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm" style="padding:6px"></i></button>';                               
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
    }

        return view('admin.kegiatan.index');
    
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
        
        $post   =   Kegiatan::create(
                    [
                        'kpi' => $request->kpi,
                        'unit_id' => $request->unitpelaksana,
                        'catatan' => $request->catatan,
                        'rencana_kegiatan' => $request->rencana_kegiatan,
                        'tahun' => $request->tahun,
                        'target' => $request->target,
                        'waktu' => $request->waktu,
                        'rab' => $request->rab,
                    ]); 

        return view('admin.kegiatan.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::where('status', '=', 'Aktif')->get();
        $where = array('id' => $id);
        $post  = Kegiatan::where($where)->first();
     
        return view('admin.kegiatan.kegiatan-edit', compact('post','unit'));
    }

    public function info($id)
    {
        $where = array('id' => $id);
        $post  =  Kegiatan::with('units')->where($where)->get();
        $result = $post->toArray();
     
        return response()->json($result);
    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Kegiatan::where('id',$id)->delete();
     
        return response()->json($post);
    }


    public function create(){
        $unit = Unit::where('status', '=', 'Aktif')->get();
        return view('admin.kegiatan.kegiatan-baru', compact('unit'));
    }



    public function update(Request $request, $id){

            $where = array('id' => $id);
            $kegiatan = Kegiatan::where($where)->first();
            
            $kegiatan->update([
                'kpi' => $request->kpi,
                'unit_id' => $request->unitpelaksana,
                'catatan' => $request->catatan,
                'rencana_kegiatan' => $request->rencana_kegiatan,
                'tahun' => $request->tahun,
                'target' => $request->target,
                'waktu' => $request->waktu,
                'rab' => $request->rab,            
            ]);

            
            return redirect()->route('kegiatan.index');
    }

       
}
