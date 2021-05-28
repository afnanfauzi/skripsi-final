<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            @foreach ($postingan_disematkan1 as $pd)
            <div class="col-md-8 hot-post-left">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="{{ route('isi.blog', $pd->slug) }}"><img src="{{Storage::url('public/gambar/'.$pd->thumbnail)}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{ route('list.kategori', $pd->kategori->slug) }}">{{ $pd->kategori->nama_kategori }}</a>
                        </div>
                        <h3 class="post-title title-lg"><a href="{{ route('isi.blog', $pd->slug) }}">{{ $pd->judul }}</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">{{ $pd->penulis}}</a></li>
                            <li>{{ $pd->created_at }}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            @endforeach
            @foreach ($postingan_disematkan2 as $pd2)
            <div class="col-md-4 hot-post-right">
                <!-- post -->
                <div class="post post-thumb">
                    <a class="post-img" href="{{ route('isi.blog', $pd2->slug) }}"><img src="{{Storage::url('public/gambar/'.$pd2->thumbnail)}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="{{ route('list.kategori', $pd2->kategori->slug) }}">{{ $pd2->kategori->nama_kategori }}</a>
                        </div>
                        <h3 class="post-title"><a href="{{ route('isi.blog', $pd2->slug) }}">{{ $pd2->judul }}</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">{{ $pd2->penulis}}</a></li>
                            <li>{{ $pd2->created_at }}</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            @endforeach
            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->