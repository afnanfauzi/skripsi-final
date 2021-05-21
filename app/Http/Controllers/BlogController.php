<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\Label;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {
        $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->limit(8)->get();
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.index', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer'));
    }

    public function isi($slug)
    {
        $post = Artikel::with('label')->where('slug', $slug)->get();
        $meta = Artikel::with('label')->where('slug', $slug)->get();

        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.post', compact('post','data_kategori','label_footer','kategori_footer','postingan_populer','meta'));
    }
    public function list_post()
    {
        $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->paginate(5);
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer'));
    }

    public function list_kategori(Kategori $Kategori)
    {
        // $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->paginate(5);
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        $postingan = $Kategori->artikel()->where('statuspublikasi', '=', 'Ya')->paginate(5); 
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer'));
    }

    public function list_label(Label $Label)
    {
        // $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->paginate(5);
        $data_kategori = Kategori::limit(5)->get();
        $label_footer = Label::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::where('statuspublikasi', '=', 'Ya')->inRandomOrder()->limit(4)->get();
        $postingan = $Label->artikel()->where('statuspublikasi', '=', 'Ya')->paginate(5); 
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer'));
    }

    public function cari(Request $request)
    {
        $where = array('statuspublikasi' => 'Ya');
        // $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->paginate(5);
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
        
        return view('blog.list-post', compact('postingan','data_kategori','label_footer','kategori_footer','postingan_populer'));
        // return dd($postingan->count());
    }
}
