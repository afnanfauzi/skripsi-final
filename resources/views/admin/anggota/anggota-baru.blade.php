<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Select2 -->
<link href="{{ asset('dashboard/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<!-- ckEditor -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<!-- Parsley -->
<script src="{{ asset('dashboard/vendors/parsleyjs/dist/parsley.min.js') }}"></script>


@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Tambahkan Anggota - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambahkan Anggota </h2>
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

            <form method="post" action="{{ route('anggota.store') }}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="x_content">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="akun_id">ID Anggota <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="akun_id" name="akun_id" required="required" class="form-control">
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label for="nama_anggota" class="col-form-label col-md-3 col-sm-3 label-align">Nama Anggota <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="nama_anggota" class="form-control" required="required" type="text" name="nama_anggota">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Unit <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="unit_id" id="unit_id" class="form-control" required="required">
                                    <option value="" holder>Pilih Unit</option>
                                    @foreach ($unit as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="jabatan_id" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="jabatan_id" id="jabatan_id" class="form-control" required="required">
                                    <option value="" holder>Pilih Jabatan</option>
                                    @foreach ($jabatan as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="tgl_lahir" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="jenkel" class="btn-group" data-toggle="buttons" >
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="jenkel" value="Laki-Laki" class="join-btn"> &nbsp; Laki-Laki &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="jenkel" value="Perempuan" class="join-btn"> Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp">No Telepon 
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="no_telp" name="no_telp" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="alamat" class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="alamat" class="form-control" type="text" name="alamat">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Foto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type='file' id="gambar" accept="gambar/*" name="gambar" multiple="multiple" required="required" class="form-control" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-9 col-sm-9" style="padding-left: 313px;">
                                <div id="upload_prev">
                                    <img id="preview" src="" width="130" style="border: 3px solid #6c757d" />
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <a href="{{ route('anggota.index') }}" class="btn btn-info" type="button">Kembali</a>
                            </div>
                        </div>

                    
            
                </div>
            </form>
        </div>
    </div>
        
{{-- </div> --}}


<script>
    function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#gambar").change(function () {
            readURL(this, 'preview');
        });
    </script>

@endsection




    

