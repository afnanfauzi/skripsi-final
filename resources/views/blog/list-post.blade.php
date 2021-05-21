@extends('layouts.master-blog')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Daftar Postingan')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    {{-- <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Postingan Terbaru</h2>
                        </div>
                    </div> --}}
                    <!-- post -->
                    @if($postingan->count() > 0)
                        @foreach($postingan as $post)
                        <div class="post post-row">
                            <a class="post-img" href="{{ route('isi.blog', $post->slug) }}"><img src="{{Storage::url('public/gambar/'.$post->thumbnail)}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{ route('list.kategori', $post->kategori->slug) }}">{{ $post->kategori->nama_kategori }}</a>
                                </div>
                                <h3 class="post-title"><a href="{{ route('isi.blog', $post->slug) }}">{{ $post->judul }}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="#">{{ $post->penulis}}</a></li>
                                    <li>{{ $post->created_at }}</li>
                                </ul>
                                <p>{!! Illuminate\Support\Str::limit($post->isi, 180, $end='...') !!}</p>
                            </div>
                        </div>
                        @endforeach
                        <!-- /post -->
                        <center>{{ $postingan->links() }}</center>
                    @else
                        <p>Postingan Tidak Ditemukan.</p>
                    @endif
                </div>
                <!-- /row -->

                {{-- <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Tampilkan Lebih Banyak</a>
                </div> --}}
            </div>
            
            @include('blog.sidebar-blog')
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->  
@endsection