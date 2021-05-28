<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Halaman;
use App\Kategori;
use App\Label;
use App\Unduhan;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {
        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $postingan_disematkan1 = Artikel::where('statuspublikasi', '=', 'Ya')->where('sematkan', '=', 'Ya')->latest()->limit(1)->get();
        $postingan_disematkan2 = Artikel::where('statuspublikasi', '=', 'Ya')->where('sematkan', '=', 'Ya')->offset(1)->latest()->limit(2)->get();
        $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->limit(8)->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.index', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer','postingan_disematkan1','postingan_disematkan2','menuprofil'));
    }

    public function isi($slug)
    {
        $post = Artikel::with('label')->where('slug', $slug)->get();
        $meta = Artikel::with('label')->where('slug', $slug)->get();

        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.post', compact('post','data_kategori','label_footer','kategori_footer','postingan_populer','meta','menuprofil'));
    }
    public function list_post()
    {
        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->paginate(5);
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer','menuprofil'));
    }

    public function list_kategori(Kategori $Kategori)
    {
        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        $postingan = $Kategori->artikel()->where('statuspublikasi', '=', 'Ya')->paginate(5); 
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer','menuprofil'));
    }

    public function list_label(Label $Label)
    {
        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        $postingan = $Label->artikel()->where('statuspublikasi', '=', 'Ya')->paginate(5); 
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer','menuprofil'));
    }

    public function cari(Request $request)
    {
        $where = array('statuspublikasi' => 'Ya');
        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        $hitung_post = Artikel::where($where)->count();
        if ($hitung_post > 0){
            $postingan = Artikel::where('judul', $request->cari)->orWhere('judul', 'like', '%'.$request->cari.'%')->paginate(5); 
        }else{
            $postingan = Artikel::where($where)->get();
        } 
        
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer','menuprofil'));
        // return dd($postingan->count());
    }

    public function halaman($slug)
    {
        $post = Halaman::where('slug', $slug)->get();
        $meta = Halaman::where('slug', $slug)->get();

        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.post-halaman', compact('post','data_kategori','label_footer','kategori_footer','postingan_populer','meta','menuprofil'));
    }
    
    public function unduhan(Request $request)
    {
        $post = Unduhan::all();
        if($request->ajax()){
            return datatables()->of($post)
                        ->addColumn('action', function($data){
                            $button = '<a href="'.$data->filepath.'" data-toggle="tooltip" target="_blank" data-original-title="Unduh" class="edit btn btn-primary btn-sm edit-post" title="Unduh"><i class="fa fa-download fa-md"></i></a>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        };

        $menuprofil = Halaman::where('statuspublikasi', '=', 'Ya')->where('menu', '=', 'Ya')->oldest()->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.post-unduhan', compact('post','data_kategori','label_footer','kategori_footer','postingan_populer','menuprofil'));
    }
}
