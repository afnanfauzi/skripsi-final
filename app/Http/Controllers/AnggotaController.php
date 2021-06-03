<?php

namespace App\Http\Controllers;

use Validator;
use App\Anggota;
use App\Cabang;
use App\Jabatan;
use App\Unit;
use Illuminate\Http\Request;
use App\CustomHelpers\ImageHelper;
use App\Ranting;
use Illuminate\Support\Carbon; 
use File;


class AnggotaController extends Controller
{
    // Membatasi route agar user tidak bisa akses selain method index dan info
    public function __construct()
    {
        $this->middleware(['role:admin'])->except('index', 'info');
    }

    public function index(Request $request)
    {
   
    $anggota = Anggota::with('units')->get();
    if($request->ajax()){
        if(auth()->user()->hasrole('admin')){
            return datatables()->of($anggota)
                    ->addColumn('action', function($data){
                        $button = '<a href="anggota/'.$data->id.'/edit" data-toggle="tooltip"   data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm" style="padding:6px"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm" style="padding:6px"></i></button>';   
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Info Anggota" class="edit btn btn-info btn-sm open-info" title="Lihat Detail Anggota"><i class="fa fa-info fa-sm" style="padding:6px"></i></a>';    
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }else{
            return datatables()->of($anggota)
                    ->addColumn('action', function($data){
                        $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Info Anggota" class="edit btn btn-info btn-sm open-info" title="Lihat Detail Anggota"><i class="fa fa-info fa-sm" style="padding:6px"></i></a>';    
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
          }
        
    }

        return view('admin.anggota.index');
    
    }
        // return $anggota;}


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Silahkan masukkan :attribute terlebih dahulu.'
        ];

        $this->validate($request, [
                    // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],$messages);
        
            // menyimpan data file yang diupload ke variabel $file
            // $file = $request->file('gambar');
            // $imageName = ImageHelper::addImage($request->file('gambar'));
        
            // $nama_file = time()."_".$file->getClientOriginalName();
        
            //     // isi dengan nama folder tempat kemana file diupload
            // $tujuan_upload = public_path('gambar');
            // $file->move($tujuan_upload,$nama_file);
        
        
            $kirim = Anggota::create([
                'gambar' => $request->gambar,
                'nama_anggota' => $request->nama_anggota,
                'nik' => $request->nik,
                'akun_id' => $request->akun_id,
                'cabang_id' => $request->cabang_id,
                'ranting_id' => $request->ranting_id,
                'status_kepengurusan' => $request->status_kepengurusan,
                'level_kepengurusan' => $request->level_kepengurusan ?? '-',
                'unit_id' => $request->unit_id,
                'jabatan_id' => $request->jabatan_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenkel' => $request->jenkel,
                'pekerjaan' => $request->pekerjaan,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                
            ]);
        
            // return dd($kirim);
            return redirect()->route('anggota.index');
}
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabang = Cabang::all();
        $ranting = Ranting::all();
        $jabatan = Jabatan::where('status', '=', 'Aktif')->get();
        $unit = Unit::where('status', '=', 'Aktif')->get();
        $where = array('id' => $id);
        $post  = Anggota::where($where)->first();
     
        return view('admin.anggota.anggota-edit', compact('post','unit','jabatan','ranting','cabang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $where = array('id' => $id);
        $img = Anggota::where($where)->first();
        ImageHelper::deleteImage($img->gambar);
        $img->delete();

        // 
        // $image_path = public_path()."/gambar/".$img->gambar;
        // unlink($image_path);
        // $post = Anggota::where('id',$id)->delete();
        
        return view('admin.anggota.index');
    }
    
    public function update(Request $request, $id){

        $messages = [
            'required' => 'Silahkan masukkan :attribute terlebih dahulu.'
        ];

        $this->validate($request, [
                    // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],$messages);

            $where = array('id' => $id);
            $anggota = Anggota::where($where)->first();
            // $imageName = ImageHelper::changeImage($request->file('gambar'), $anggota->gambar);


            $anggota->update([
                'gambar' => $request->gambar,
                'nama_anggota' => $request->nama_anggota,
                'nik' => $request->nik,
                'akun_id' => $request->akun_id,
                'cabang_id' => $request->cabang_id,
                'ranting_id' => $request->ranting_id,
                'status_kepengurusan' => $request->status_kepengurusan,
                'level_kepengurusan' => $request->level_kepengurusan ?? '-',
                'unit_id' => $request->unit_id,
                'jabatan_id' => $request->jabatan_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenkel' => $request->jenkel,
                'pekerjaan' => $request->pekerjaan,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'alamat' => $request->alamat,            
            ]);

            
            return redirect()->route('anggota.index');
    }

    

    public function create()
    {
        $cabang = Cabang::all();
        $ranting = Ranting::all();
        $jabatan = Jabatan::where('status', '=', 'Aktif')->get();
        $unit = Unit::where('status', '=', 'Aktif')->get();
        $anggota = Anggota::all();
        return view('admin.anggota.anggota-baru', compact('anggota', 'unit', 'jabatan','cabang','ranting'));
    }

    public function info($id){
        $where = array('id' => $id);
        $post  =  Anggota::with('jabatan','units','cabang','ranting')->where($where)->get();
        $result = $post->toArray();
        $date = Carbon::parse($result[0]['tgl_lahir'])->locale('id')->isoFormat('LL');
        
        // dd($date);
        // return response()->json($result);
        return response()->json(array(
            'result' => $result,
            'date' => $date,
        ));
    }
     
       
}
