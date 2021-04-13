<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Select2 -->
<link href="{{ asset('dashboard/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<!-- ckEditor -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- Select custom -->
<link href="{{ asset('css/custom-select-multiple.css') }}" rel="stylesheet">
<script src="{{ asset('js/custom-select-multiple.js') }}"></script>
{{-- <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0"> --}}
{{-- <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script> --}}


@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Artikel - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Buat Postingan Baru</h2>
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

            <form method="post" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="x_content">
                <input type="text" placeholder="Judul" id="judul" name="judul" class="form-control" value="{{ old('judul') }}">
                    <div class="form-group">
                        <textarea class="form-control" id="isi" name="isi">{{ old('isi') }}</textarea>
                    </div>
                <br />
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group row">
                    <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px;" style="text-align: right;">Kategori :</label>
                    <div class="col-md-2 col-sm-2" style="text-align: right;">
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            <option value="" holder>Pilih Kategori</option>
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ (collect(old('kategori_id'))->contains($kategori->id)) ? 'selected':'' }}>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                          </select>
                    </div>
                    <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px;" style="text-align: right;">Publikasi :</label>
                    <div class="col-md-2 col-sm-2" style="text-align: right;">
                        <select name="nama_status" id="nama_status" class="form-control">
                            <option value="" holder>Pilih Status</option>
                            @foreach ($status as $s)
                                <option value="{{ $s->id }}" {{ (collect(old('nama_status'))->contains($s->id)) ? 'selected':'' }}>{{ $s->nama_status }}</option>
                            @endforeach
                          </select>
                    </div>
                    <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px; text-align: right;">Tags:</label>
                        <div class="col-md-2 col-sm-2"> 
                            <select id="choices-multiple-remove-button" placeholder="Pilih maksimal 5 tags" multiple name="tags[]" class="form-control">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->nama_tags }}</option>
                            @endforeach
                            </select> 
                        </div>
                    
                    <div class="col-md-3 col-sm-3" style="text-align: right;">
                        <a href="{{ route('artikel.index') }}" class="btn btn-primary" type="button">Kembali</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Publikasikan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
        
{{-- </div> --}}

        
    <script>
        CKEDITOR.replace( 'isi' );
    </script>
    
    <script>
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:5,
        searchResultLimit:5,
        renderChoiceLimit:5
        });
    </script>
@endsection




    

