@extends('layouts.master-blog')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('meta-tag')
@foreach ($meta as $meta)
    @include('meta::manager', [
    'title'         => $meta->judul,
    'description'   => Illuminate\Support\Str::limit($meta->isi, 140),
    ])
@endforeach   
@endsection
@foreach ($post as $post)
    @section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post share -->
                    {{-- <div class="section-row">
                        <div class="post-share">
                            <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                            <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                            <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                            <a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
                        </div>
                    </div> --}}
                    <!-- /post share -->

                    <!-- post content -->
                    <div class="section-row">
                        {!! $post->isi !!}
                    </div>
                    <!-- /post content -->

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
