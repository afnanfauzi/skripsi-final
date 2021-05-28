<?php

namespace App\Http\Controllers;

use App\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HalamanController extends Controller
{
    public function index(Request $request)
    {
        
        $halaman = Halaman::all();
       
        if($request->ajax()){
            return datatables()->of($halaman)
                        ->addColumn('action', function($data){
                            $button = '<a href="halaman/'.$data->id.'/edit" data-toggle="tooltip"   data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash fa-sm" title="Hapus Data"></i></button>';      
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    
        return view('admin.halaman.index');
    }  

    public function create()
    {
        return view('admin.halaman.halaman-baru');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Silahkan masukkan :attribute terlebih dahulu.'
        ];

        $validasi = $request->validate([
            'judul'=>'required',
            'isi'=>'required',
        ],$messages);

        $post = Halaman::Create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' =>$request->isi,
            'statuspublikasi' =>$request->nama_status ?? 'Tidak',
            'menu' =>$request->menu ?? 'Tidak',
            'penulis' =>'Admin',

        ]);

        return redirect()->action([HalamanController::class, 'index']);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Halaman::where($where)->first();
       
        return view('admin.halaman.halaman-edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Silahkan masukkan :attribute terlebih dahulu.'
        ];

        $validasi = $request->validate([
            'judul'=>'required',
            'isi'=>'required',
        ],$messages);

        $post = Halaman::findorFail($id);

        $post_data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' =>$request->isi,
            'statuspublikasi' =>$request->nama_status ?? 'Tidak',
            'menu' =>$request->menu ?? 'Tidak',
            'penulis' =>'Admin',
        ];

        $post->update($post_data);

        return redirect()->action([HalamanController::class, 'index']);
    }

    public function destroy($id)
    {
        $where = array('id' => $id);
        $halaman = Halaman::where($where)->first();
        $halaman->delete();
 
        return view('admin.halaman.index');
    }


}
