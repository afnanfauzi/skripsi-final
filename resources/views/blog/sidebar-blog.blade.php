<div class="col-md-4">
    <!-- ad widget-->
    {{-- <div class="aside-widget text-center">
        <a href="#" style="display: inline-block;margin: auto;">
            <img class="img-responsive" src="{{ asset('dashboard/blog/img/ad-3.jpg')}}" alt="">
        </a>
    </div> --}}
    <!-- /ad widget -->

    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Sosial Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="https://www.facebook.com/pdmkabsragen" class="social-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                        <span>Ikuti<br>Kami</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/pdmsragen/" class="social-instagram" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <span>Ikuti<br>Kami</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCLBHUE6_iF83IT-robSqkgQ" class="social-youtube" target="_blank">
                        <i class="fa fa-youtube-play"></i>
                        <span>Ikuti<br>Kami</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Kategori</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach($data_kategori as $data_kategori)
                <li><a href="{{ route('list.kategori', $data_kategori->slug) }}">{{ $data_kategori->nama_kategori }} <span>{{ $data_kategori->artikel->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /category widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Postingan Menarik</h2>
        </div>
        @foreach($postingan_populer as $pp)
        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href="{{ route('isi.blog', $pp->slug) }}"><img src="{{ $pp->thumbnail }}" alt="" class="sidebar"></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="{{ route('list.kategori', $data_kategori->slug) }}">{{ $pp->kategori->nama_kategori }}</a>
                </div>
                <h3 class="post-title"><a href="{{ route('isi.blog', $pp->slug) }}">{{ $pp->judul }}</a></h3>
            </div>
        </div>
        @endforeach
        <!-- /post -->
    </div>
    <!-- /post widget -->
</div>