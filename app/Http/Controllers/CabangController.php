<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabang;
use App\Anggota;
use App\Ranting;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cabang = Cabang::with('ranting','anggota')->get();
        $anggota = Anggota::where('jabatan_id', '=', 1)->where('unit_id', '=', 2)->get();

    
        if($request->ajax()){
            return datatables()->of($cabang)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$data->id.'" title="Lihat Detail Cabang" class="open-info btn btn-info"><i class="fa fa-info fa-sm"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm" style="padding:6px"></i></a>';
                            // $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm" style="padding:6px"></i></button>';                               
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    
        return view('admin.cabang.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cabang = Cabang::all();
        // $anggota = Anggota::where('jabatan_id', '=', 1)->get();

        // return view('admin.cabang.cabang-baru', compact('cabang', 'anggota'));
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
        
        $post   =   Cabang::updateOrCreate(['id' => $id],
                    [
                        'nama_cabang' => $request->nama_cabang,
                        'anggota_id' => $request->anggota_id,
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

        $where = array('id' => $id);
        $where2 = array('cabang_id' => $id);
        $where3 = array('status_ranting' => 'Aktif');
        $where4 = array('status_ranting' => 'Kurang Aktif');
        $where5 = array('status_ranting' => 'Tidak Aktif');
        $where6 = array('status_ranting' => 'Tidak Ada Ranting');

        $post  =  Cabang::with('ranting','anggota')->where($where)->get();
        $ranting = Ranting::where($where2)->count();
        $aktif = Ranting::where($where2)->where($where3)->count();
        $kurang = Ranting::where($where2)->where($where4)->count();
        $tidakAktif = Ranting::where($where2)->where($where5)->count();
        $tidakAda = Ranting::where($where2)->where($where6)->count();
        
        
       

        
       
        return response()->json(array(
            'post' => $post,
            'ranting' => $ranting,
            'aktif' => $aktif,
            'kurang' => $kurang,
            'tidakAktif' => $tidakAktif,
            'tidakAda' => $tidakAda,
        ));

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
        $post  = Cabang::with('ranting','anggota')->where($where)->first();

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
        $post = Cabang::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
