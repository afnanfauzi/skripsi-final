<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
// use App\StatusPublikasi;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use App\CustomHelpers\ImageHelper;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $artikel = Artikel::with('kategori','anggota')->get();
       
        if($request->ajax()){
            return datatables()->of($artikel)
                        ->addColumn('action', function($data){
                            $button = '<a href="artikel/'.$data->id.'/edit" data-toggle="tooltip"   data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash fa-sm" title="Hapus Data"></i></button>';      
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    
        return view('admin.artikel.index');
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $status = StatusPublikasi::all();
        $tags = Tags::all();
        $kategori = Kategori::all();
        return view('admin.artikel.artikel-baru', compact('kategori', 'tags'));
    }

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

        $validasi = $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'kategori_id'=>'required',
            'tags'=>'required',
            'nama_status'=>'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ],$messages);

        $imageName = ImageHelper::addImage($request->file('thumbnail'));

        $post = Artikel::Create([
            'thumbnail' =>$imageName ?? 'default.jpg',
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' =>$request->isi,
            'statuspublikasi' =>$request->nama_status,
            'kategori_id' =>$request->kategori_id,
            'penulis' =>'Admin',
            // 'tags' => Str::slug($request->tags_1),
        ]);

        $tagsId = $request->tags;
        $post->tags()->attach($tagsId);

        return redirect()->action([ArtikelController::class, 'index']);


        
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
        // $status = StatusPublikasi::all();
        $kategori = Kategori::all();
        $tags = Tags::all();
        $where = array('id' => $id);
        $post  = Artikel::where($where)->first();
       
        // return $post;
        return view('admin.artikel.artikel-edit', compact('kategori', 'tags','post'));
        // return view('artikel.artikel-edit', compact('kategori', 'tags'), ['post' => $request->post])->render();
       
        
    }

    // public function editArtikel(Request $request){
    //     $kategori = Kategori::all();
    //     $tags = Tags::all();
    //     return view('artikel.artikel-edit', compact('kategori', 'tags'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Silahkan masukkan :attribute terlebih dahulu.'
        ];

        $validasi = $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'kategori_id'=>'required',
            'tags'=>'required',
            'nama_status'=>'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ],$messages);

        $post = Artikel::findorFail($id);
        $imageName = ImageHelper::changeImage($request->file('thumbnail'), $post->thumbnail);


        $post_data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' =>$request->isi,
            'thumbnail' =>$imageName,
            'statuspublikasi' =>$request->nama_status,
            'kategori_id' =>$request->kategori_id,
            'penulis' =>'Admin',
            // 'tags' => Str::slug($request->tags_1),
        ];

        $tagsId = $request->tags;
        $post->tags()->sync($tagsId);
        $post->update($post_data);

        return redirect()->action([ArtikelController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Artikel::where('id',$id)->delete();
        $where = array('id' => $id);
        $img = Artikel::where($where)->first();
        ImageHelper::deleteImage($img->thumbnail);
        $img->delete();
 
        return view('admin.artikel.index');
    }

    // public function upload(Request $request)
    // {
    //     if($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName.'_'.time().'.'.$extension;
    //         $request->file('upload')->move(public_path('gambar'), $fileName);
    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('gambar/'.$fileName); 
    //         $msg = 'Image successfully uploaded'; 
    //         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
    //         @header('Content-type: text/html; charset=utf-8'); 
    //         echo $response;
    //     }
    // }
}
