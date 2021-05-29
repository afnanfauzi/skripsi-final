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

<!-- File manager -->
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Artikel Baru - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <form method="post" action="{{ route('artikel.store') }}" enctype="multipart/form-data">
                @csrf

            <div class="x_title">
                <div class="col-md-7 col-sm-7">
                    <h2 class="text-uppercase">Buat Postingan Baru</h2>
                </div>
                <div class="col-md-3 col-sm-3" style="text-align: right;">
                    <label style="padding-top:10px;">
                        <input type="checkbox" name="nama_status" id="nama_status" value="Ya" class="flat" checked="checked"> Publikasikan
                    </label>
                    <label style="padding-left: 12px; padding-top:10px;">
                        <input type="checkbox" name="sematkan" id="sematkan" value="Ya" class="flat"> Sematkan Postingan
                    </label>
                </div>
                <div class="col-md-2 col-sm-2" style="text-align: right;">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('artikel.index') }}" class="btn btn-primary btn-sm" type="button">Kembali</a>
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
                    <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px;" style="text-align: right;">Thumbnail :</label>
                    <div class="col-md-5 col-sm-5" style="text-align: right;">
                        {{-- <input type="file" name="thumbnail" id="thumbnail" style="padding-top: 10px;"> --}}
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success" style="color:white;">
                                <i class="fa fa-picture-o"></i> Pilih Gambar
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                          </div>
                          {{-- <img id="holder" style="margin-top:15px;max-height:100px;"> --}}
                    </div>
                    <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px;" style="text-align: right;">Kategori :</label>
                    <div class="col-md-2 col-sm-2" style="text-align: right;">
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            <option value="" holder>Pilih Kategori</option>
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ (collect(old('kategori_id'))->contains($kategori->id)) ? 'selected':'' }}>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                          </select>
                    </div>
                    {{-- <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px;" style="text-align: right;">Publikasi :</label> --}}
                    {{-- <div class="col-md-2 col-sm-2" >
                        <select name="nama_status" id="nama_status" class="form-control">
                            <option value="" holder>Pilih Status</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>    
                    </div> --}}
                    <label class="control-label col-md-1 col-sm-1" style="padding-top: 10px; font-size: 15px; text-align: right;">Label:</label>
                    <div class="col-md-2 col-sm-2"> 
                        <select id="choices-multiple-remove-button" placeholder="Pilih maksimal 5 label" multiple name="label[]" class="form-control">
                        @foreach ($label as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->nama_label }}</option>
                        @endforeach
                        </select> 
                    </div>
                    {{-- <div class="form-control col-md-3 col-sm-3" style="border:none;padding-top: 10px; font-size: 15px; color:#73879C;">
                        <label>
                            <input type="checkbox" name="nama_status" id="nama_status" value="Ya" class="flat" checked="checked"> Publikasikan
                        </label>
                        <label style="padding-left: 12px;">
                            <input type="checkbox" name="sematkan" id="sematkan" value="Ya" class="flat"> Sematkan Postingan
                        </label>
                    </div> --}}
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
        
        var route_prefix = "/admin/kelola-penyimpanan";
        $('#lfm').filemanager('image', {prefix: route_prefix});

    </script>
    
    {{-- load ck editor --}}
    <script>
        CKEDITOR.replace( 'isi', options );
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




    

