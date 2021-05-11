<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\Tags;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {
        $postingan = Artikel::where('statuspublikasi', '=', 'Ya')->latest()->get();
        $kategori = Kategori::limit(5)->get();
        $tags = Tags::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::inRandomOrder()->limit(4)->get();
        return view('blog.index', compact('postingan','kategori','tags','kategori_footer','postingan_populer'));
    }

    public function isi($slug)
    {
        $post = Artikel::with('tags')->where('slug', $slug)->get();
        // $cari = $post[0]['tags'];
        // return $cari;

        $kategori = Kategori::limit(5)->get();
        $tags = Tags::limit(10)->get();
        $kategori_footer = Kategori::limit(5)->get();
        $postingan_populer = Artikel::inRandomOrder()->limit(4)->get();
        return view('blog.post', compact('post','kategori','tags','kategori_footer','postingan_populer'));
    }
}
