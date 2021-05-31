@extends('layouts.master-blog')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('meta-tag')
@foreach ($meta as $meta)
    @include('meta::manager', [
    'title'         => $meta->judul,
    'description'   => Illuminate\Support\Str::limit($meta->isi, 140),
    'image'         => $meta->thumbnail,
    ])
@endforeach   
@endsection
{{-- @section('laravel-share')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script> 
@endsection --}}
@foreach ($post as $post)
    
    @section('header-post')
    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url({{ $post->thumbnail }});" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="category.html">{{ $post->kategori->nama_kategori }}</a>
                    </div>
                    <h1>{{ $post->judul }}</h1>
                    <ul class="post-meta">
                        <li><a href="#">{{ $post->penulis}}</a></li>
                        <li>{{ $post->created_at }}</li>
                        {{-- <li><i class="fa fa-comments"></i> 3</li>
                        <li><i class="fa fa-eye"></i> 807</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
    @endsection
    @section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post share -->
                    <div class="section-row">
                        <div class="post-share">
                            <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" class="social-facebook" target="_blank"><i class="fa fa-facebook"></i><span>Share</span></a>
                            <a href="https://twitter.com/share?url={{ Request::url() }}&text={{ $meta->judul }}" class="social-twitter" target="_blank"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                            <a href="https://pinterest.com/pin/create/button/?url={{ Request::url() }}&media={{ $meta->thumbnail }}&description={{ Illuminate\Support\Str::limit($meta->isi, 120) }}" class="social-pinterest" target="_blank"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                            {{-- <a href="http://www.gmail.com/sharer.php?u={{ Request::url() }}" ><i class="fa fa-envelope" target="_blank"></i><span>Email</span></a> --}}
                        </div>
                    </div>
                    <!-- /post share -->

                    <!-- post content -->
                    <div class="section-row">
                        {!! $post->isi !!}
                    </div>
                    <!-- /post content -->

                    <!-- post tags -->
                    <div class="section-row">
                        <div class="post-tags">
                            <ul>
                                <li>label:</li>
                                {{-- <li><a href="#">{{ $post->label->nama_label }}</a></li> --}}
                                @foreach($label_footer as $label_post)
								<li><a href="{{ route('list.label', $label_post->slug) }}">{{ $label_post->nama_label }}</a></li>
								@endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /post tags -->

                    {{-- <!-- post nav -->
                    <div class="section-row">
                        <div class="post-nav">
                            <div class="prev-post">
                                <a class="post-img" href="blog-post.html"><img src="./img/widget-8.jpg" alt=""></a>
                                <h3 class="post-title"><a href="#">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                                <span>Previous post</span>
                            </div>

                            <div class="next-post">
                                <a class="post-img" href="blog-post.html"><img src="./img/widget-10.jpg" alt=""></a>
                                <h3 class="post-title"><a href="#">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                                <span>Next post</span>
                            </div>
                        </div>
                    </div>
                    <!-- /post nav  --> --}}

                    {{-- <!-- /related post -->
                    <div>
                        <div class="section-title">
                            <h3 class="title">Related Posts</h3>
                        </div>
                        <div class="row">
                            <!-- post -->
                            <div class="col-md-4">
                                <div class="post post-sm">
                                    <a class="post-img" href="blog-post.html"><img src="./img/post-4.jpg" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-category">
                                            <a href="category.html">Health</a>
                                        </div>
                                        <h3 class="post-title title-sm"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="author.html">John Doe</a></li>
                                            <li>20 April 2018</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->

                            <!-- post -->
                            <div class="col-md-4">
                                <div class="post post-sm">
                                    <a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-category">
                                            <a href="category.html">Fashion</a>
                                            <a href="category.html">Lifestyle</a>
                                        </div>
                                        <h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="author.html">John Doe</a></li>
                                            <li>20 April 2018</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->

                            <!-- post -->
                            <div class="col-md-4">
                                <div class="post post-sm">
                                    <a class="post-img" href="blog-post.html"><img src="./img/post-7.jpg" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-category">
                                            <a href="category.html">Health</a>
                                            <a href="category.html">Lifestyle</a>
                                        </div>
                                        <h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="author.html">John Doe</a></li>
                                            <li>20 April 2018</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /post -->
                        </div>
                    </div>
                    <!-- /related post --> --}}

                    <!-- post comments -->
                    {{-- <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">3 Comments</h3>
                        </div>
                        <div class="post-comments">
                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/avatar-2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">5 min ago</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="reply">Reply</a>
                                    <!-- comment -->
                                    <div class="media media-author">
                                        <div class="media-left">
                                            <img class="media-object" src="./img/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4>John Doe</h4>
                                                <span class="time">5 min ago</span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                    <!-- /comment -->
                                </div>
                            </div>
                            <!-- /comment -->

                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/avatar-3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">5 min ago</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="reply">Reply</a>
                                </div>
                            </div>
                            <!-- /comment -->
                        </div>
                    </div> --}}
                    <!-- /post comments -->

                    <!-- post reply -->
                    <div class="section-row">
                        <div class="section-title">
                            <h3 class="title">Tinggalkan Komentar</h3>
                            <div id="disqus_thread" style="padding-top: 5px;"></div>
                                <script>
                                    /**
                                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                                    /*
                                    var disqus_config = function () {
                                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
                                    */
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://pdm-sragen.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                        {{-- <form class="post-reply">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="input" type="text" name="website" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="primary-button">Submit</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <!-- /post reply -->
                </div>
                @include('blog.sidebar-blog')
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    @endsection

@endforeach
