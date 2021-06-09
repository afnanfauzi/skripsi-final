<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>

<!-- ckEditor -->
{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>


@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Edit Halaman - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <form method="post" action="{{ route('halaman.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

            <div class="x_title">
                <div class="col-md-8 col-sm-8">
                    <h2 class="text-uppercase">Edit Halaman</h2>
                </div>
                <div class="col-md-4 col-sm-4" style="text-align: right;">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('halaman.index') }}" class="btn btn-primary btn-sm" type="button">Kembali</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <input type="text" placeholder="Judul" id="judul" name="judul" class="form-control" value="{{ $post->judul }}">
                    <div class="form-group">
                        <textarea class="form-control" id="isi" name="isi">{{ $post->isi }}</textarea>
                    </div>
                <br />
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group row">
                    <div class="form-control col-md-5 col-sm-5" style="border:none;padding-top: 10px; font-size: 15px; color:#73879C;">
                        <label>
                            <input type="checkbox" name="nama_status" id="nama_status" value="Ya" class="flat" {{  ($post->statuspublikasi == 'Ya' ? ' checked' : '') }}> Publikasikan
                        </label>
                        <label style="padding-left: 12px;">
                            <input type="checkbox" name="menu" id="menu" value="Ya" class="flat" {{  ($post->menu == 'Ya' ? ' checked' : '') }}> Tambahkan Ke Menu Utama
                        </label>
                    </div>

                    {{-- </div> --}}
                    
                </div>
            </div>
        </form>
        </div>
    </div>

    {{-- tambahkan gambar/file pada ck editor --}}
    <script>
        var options = {
          filebrowserImageBrowseUrl: '/admin/kelola-penyimpanan?type=Images',
          filebrowserImageUploadUrl: '/admin/kelola-penyimpanan/upload?type=Images&_token='+ $('meta[name=csrf-token]').attr("content"),
          filebrowserBrowseUrl: '/admin/kelola-penyimpanan?type=Files',
          filebrowserUploadUrl: '/admin/kelola-penyimpanan/upload?type=Files&_token='+ $('meta[name=csrf-token]').attr("content")
        };
    </script>
    
    {{-- load ck editor --}}
    <script>
        CKEDITOR.replace( 'isi', options );
    </script>
    
@endsection





    

