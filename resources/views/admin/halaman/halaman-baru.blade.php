<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>


<!-- ckEditor -->
{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

<!-- Select custom -->
<link href="{{ asset('css/custom-select-multiple.css') }}" rel="stylesheet">
<script src="{{ asset('js/custom-select-multiple.js') }}"></script>
{{-- <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0"> --}}
{{-- <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script> --}}


@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Halaman Baru - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <form method="post" action="{{ route('halaman.store') }}" enctype="multipart/form-data">
                @csrf

            <div class="x_title">
                <div class="col-md-8 col-sm-8">
                    <h2 class="text-uppercase">Buat Halaman Baru</h2>
                </div>
                <div class="col-md-4 col-sm-4" style="text-align: right;">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('halaman.index') }}" class="btn btn-primary btn-sm" type="button">Kembali</a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            {{-- menampilkan error validasi --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="x_content">
                <input type="text" placeholder="Judul" id="judul" name="judul" class="form-control" value="{{ old('judul') }}">
                    <div class="form-group">
                        <textarea class="form-control" id="isi" name="isi">{{ old('isi') }}</textarea>
                    </div>
                <br />
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group row">
                    <div class="form-control col-md-5 col-sm-5" style="border:none;padding-top: 10px; font-size: 15px; color:#73879C;">
                        <label>
                            <input type="checkbox" name="nama_status" id="nama_status" value="Ya" class="flat" checked="checked"> Publikasikan
                        </label>
                        <label style="padding-left: 12px;">
                            <input type="checkbox" name="menu" id="menu" value="Ya" class="flat"> Tambahkan Ke Menu Utama
                        </label>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
        
{{-- </div> --}}

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




    

