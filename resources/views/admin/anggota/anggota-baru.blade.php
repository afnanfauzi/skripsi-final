<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
{{-- Custom select --}}
<link href="{{ asset('dashboard/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('dashboard/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- ckEditor -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<!-- Parsley -->
<script src="{{ asset('dashboard/vendors/parsleyjs/dist/parsley.min.js') }}"></script>

<!-- File manager -->
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

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
                <h2 class="text-uppercase">Tambahkan Anggota </h2>
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
                            <label for="nama_anggota" class="col-form-label col-md-3 col-sm-3 label-align">Nama Anggota <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="nama_anggota" class="form-control" required="required" type="text" name="nama_anggota">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Nomor Induk Kependudukan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nik" name="nik" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="akun_id">No Baku Muhammdiyah / Aisyiah
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="akun_id" name="akun_id" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Pengurus <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="status_kepengurusan" id="status_kepengurusan" class="custom-select" required="required" style="width: 100%;">
                                    <option value="" holder>Silahkan Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div id="opsi_pengurus" style="display:none">
                            <div class="item form-group">
                                <label for="level_kepengurusan" class="col-form-label col-md-3 col-sm-3 label-align">Level <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="level_kepengurusan" id="level_kepengurusan" class="custom-select" style="width: 100%;">
                                        <option value="" holder>Pilih Level</option>
                                        <option value="Kabupaten">Kabupaten</option>
                                        <option value="Cabang">Cabang</option>
                                        <option value="Ranting">Ranting</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Unit <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="unit_id" id="unit_id" class="custom-select" style="width: 100%;">
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
                                    <select name="jabatan_id" id="jabatan_id" class="custom-select" style="width: 100%;">
                                        <option value="" holder>Pilih Jabatan</option>
                                        @foreach ($jabatan as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="opsi_level">
                            <div class="item form-group">
                                <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Cabang <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="cabang_id" id="cabang_id" class="custom-select"  style="width: 100%;">
                                        <option value="" holder>Pilih Cabang</option>
                                        @foreach ($cabang as $cabang)
                                            <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="opsi_ranting">
                                <div class="item form-group">
                                    <label for="jabatan_id" class="col-form-label col-md-3 col-sm-3 label-align">Ranting</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="ranting_id" id="ranting_id" class="custom-select"  style="width: 100%;">
                                            <option value="" holder>Pilih Ranting</option>
                                            @foreach ($ranting as $ranting)
                                                <option value="{{ $ranting->id }}">{{ $ranting->nama_ranting }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tempat, Tanggal Lahir <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required="required">
                            </div>
                            <div class="col-md-2 col-sm-2 ">
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
                                <div id="jenkel" class="col-form-label">
                                    <input type="radio" class="flat" name="jenkel" id="laki-laki" value="Laki-Laki" /> Laki-Laki
                                    <input type="radio" class="flat" name="jenkel" id="perempuan" value="Perempuan" /> Perempuan
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan">Pekerjaan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control">
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email 
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="email" name="email" class="form-control">
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
                                {{-- <input type='file' id="gambar" accept="gambar/*" name="gambar" multiple="multiple" required="required" class="form-control" /> --}}
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="gambar" data-preview="holder" class="btn btn-primary" style="color:white;">
                                        <i class="fa fa-picture-o"></i> Pilih Gambar
                                      </a>
                                    </span>
                                    <input id="gambar" class="form-control" type="text" name="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kosong"></label>
                            <div class="col-md-6 col-sm-6">
                                <div id="upload_prev">
                                    {{-- <img id="preview" src="" width="130" style="border: 3px solid #6c757d" /> --}}
                                    <div id="holder" style="margin-top:10px;max-height:100px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('anggota.index') }}" class="btn btn-info" type="button">Kembali</a>
                            </div>
                        </div>

                    
            
                </div>
            </form>
        </div>
    </div>
        
{{-- </div> --}}



<script>
    // Untuk File Manager
    var route_prefix = "/admin/kelola-penyimpanan";
    $('#lfm').filemanager('image', {prefix: route_prefix});
    // End

    // function readURL(input, id) {
    //         if (input.files && input.files[0]) {
    //             var reader = new FileReader();

    //             reader.onload = function (e) {
    //                 $('#' + id).attr('src', e.target.result);
    //             }

    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     }
    //     $("#gambar").change(function () {
    //         readURL(this, 'preview');
    //     });



        $(document).ready(function(){
            $('#status_kepengurusan').on('change', function() {
                if ( this.value == 'Ya')
                    {
                        $("#opsi_pengurus").show();
                    }
                else
                    {
                        $("#opsi_pengurus").hide();
                        $("#opsi_level").show(); 
                    }
            });

            $('#level_kepengurusan').on('change', function() {
                if ( this.value == 'Kabupaten')
                    {
                        $("#opsi_level").hide();
                    }
                else if ( this.value == 'Cabang'){
                        $("#opsi_level").show();   
                        $("#opsi_ranting").hide();
                    }
                else
                    {
                        $("#opsi_level").show(); 
                        $("#opsi_ranting").show();  
                    }
            });
        });

        $(document).ready(function() {
            $('.custom-select').select2();
        });
    </script>

@endsection




    

