@extends('layouts.master-blog')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
@include('blog.announce-blog')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Postingan Terbaru</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($postingan as $postingan)
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="{{ route('isi.blog', $postingan->slug) }}"><img src="{{Storage::url('public/gambar/'.$postingan->thumbnail)}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="#">{{ $postingan->kategori->nama_kategori }}</a>
                                </div>
                                <h3 class="post-title"><a href="#">{{ $postingan->judul }}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="#">{{ $postingan->penulis}}</a></li>
                                    <li>{{ $postingan->created_at }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /post -->
                </div>
                <!-- /row -->

                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Tampilkan Lebih Banyak</a>
                </div>
            </div>
            
            @include('blog.sidebar-blog')
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->    
@endsection