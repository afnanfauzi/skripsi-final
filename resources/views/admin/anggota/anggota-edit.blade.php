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

<!-- File manager -->
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>


@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Edit Data Anggota - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-uppercase">Edit Data Anggota </h2>
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

            <form method="post" action="{{ route('anggota.update', $post->id) }}" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                {{ method_field('PUT') }}
                <div class="x_content">
                    <div class="item form-group">
                        <label for="nama_anggota" class="col-form-label col-md-3 col-sm-3 label-align">Nama Anggota <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="nama_anggota" class="form-control" required="required" type="text" name="nama_anggota" value="{{ $post->nama_anggota }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">Nomor Induk Kependudukan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nik" name="nik" required="required" class="form-control" value="{{ $post->nik }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="akun_id">No Baku Muhammdiyah / Aisyiah
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="akun_id" name="akun_id" class="form-control" value="{{ $post->akun_id }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Pengurus <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="status_kepengurusan" id="status_kepengurusan" class="custom-select" required="required" style="width: 100%;">
                                <option value="" holder>Silahkan Pilih</option>
                                <option value="Ya" <?php if($post->status_kepengurusan=="Ya") echo 'selected="selected"'; ?>>Ya</option>
                                <option value="Tidak" <?php if($post->status_kepengurusan=="Tidak") echo 'selected="selected"'; ?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div id="opsi_pengurus" style="display:none">
                        <div class="item form-group">
                            <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Level <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="level_kepengurusan" id="level_kepengurusan" class="custom-select" style="width: 100%;" value="{{ $post->level_kepengurusan }}">
                                    <option value="" holder>Pilih Level</option>
                                    <option value="Kabupaten" <?php if($post->level_kepengurusan=="Kabupaten") echo 'selected="selected"'; ?>>Kabupaten</option>
                                    <option value="Cabang" <?php if($post->level_kepengurusan=="Cabang") echo 'selected="selected"'; ?>>Cabang</option>
                                    <option value="Ranting"  <?php if($post->level_kepengurusan=="Ranting") echo 'selected="selected"'; ?>>Ranting</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="unit" class="col-form-label col-md-3 col-sm-3 label-align">Unit <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="unit_id" id="unit_id" class="custom-select" style="width: 100%;">
                                    <option value="" holder>Pilih Unit</option>
                                    @foreach ($unit as $unit)
                                    <option value="{{ $unit->id }}"
                                    @if ($post->unit_id == $unit->id)
                                        selected
                                    @endif    
                                        >{{ $unit->nama_unit }}</option>
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
                                    <option value="{{ $jabatan->id }}"
                                    @if ($post->jabatan_id == $jabatan->id)
                                        selected
                                    @endif    
                                    >{{ $jabatan->nama_jabatan }}</option>
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
                                        <option value="{{ $cabang->id }}"
                                    @if ($post->cabang_id == $cabang->id)
                                        selected
                                    @endif    
                                        >{{ $cabang->nama_cabang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="opsi_ranting">
                            <div class="item form-group">
                                <label for="jabatan_id" class="col-form-label col-md-3 col-sm-3 label-align">Ranting</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="ranting_id" id="ranting_id" class="custom-select" style="width: 100%;">
                                        <option value="" holder>Pilih Ranting</option>
                                        @foreach ($ranting as $ranting)
                                            <option value="{{ $ranting->id }}"
                                        @if ($post->ranting_id == $ranting->id)
                                            selected
                                        @endif    
                                            >{{ $ranting->nama_ranting }}</option>
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
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required="required" value="{{ $post->tempat_lahir }}">
                        </div>
                        <div class="col-md-2 col-sm-2 ">
                            <input id="tgl_lahir" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="{{ $post->tgl_lahir }}">
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="jenkel" class="col-form-label">
                                <input type="radio" class="flat" name="jenkel" id="laki-laki" value="Laki-Laki" {{ $post->jenkel == 'Laki-Laki' ? 'checked' : ''}} /> Laki-Laki
                            </div>
                            <div id="jenkel" class="col-form-label">
                                <input type="radio" class="flat" name="jenkel" id="perempuan" value="Perempuan" {{ $post->jenkel == 'Perempuan' ? 'checked' : ''}}/> Perempuan
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan">Pekerjaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{ $post->pekerjaan }}" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp">No Telepon <span class="required">*</span> 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="no_telp" name="no_telp" class="form-control" value="{{ $post->no_telp }}" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span> 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" id="email" name="email" class="form-control" value="{{ $post->email }}" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="alamat" class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="alamat" class="form-control" type="text" name="alamat" value="{{ $post->alamat }}" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Foto </label>
                        <div class="col-md-6 col-sm-6 ">
                            {{-- <input type='file' id="gambar" accept="gambar/*" name="gambar" multiple="multiple" class="form-control" /> --}}
                            <div class="input-group">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="gambar" data-preview="holder" class="btn btn-primary" style="color:white;">
                                    <i class="fa fa-picture-o"></i> Pilih Gambar
                                  </a>
                                </span>
                                <input id="gambar" class="form-control" type="text" name="gambar" value="{{ $post->gambar }}">
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kosong"></label>
                        <div class="col-md-6 col-sm-6" >
                            <div id="upload_prev">
                                {{-- <img id="preview" src="{{Storage::url('public/gambar/'.$post->gambar)}}" width="130" style="border: 3px solid #6c757d" /> --}}
                                <div id="holder" style="margin-top:10px;max-height:100px;"><img src="{{$post->gambar}}" style="max-width: 85px;" /></div>
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
    //         readURL(this, 'holder');
    //     });


        $(document).ready(function(){
            $("#status_kepengurusan option:selected");
                if($("#status_kepengurusan option:selected").text() == 'Ya'){
                    $("#opsi_pengurus").show();
                }else{
                    $("#opsi_pengurus").hide();
                    $("#opsi_level").show(); 
                };

            
            $("#level_kepengurusan option:selected");
                if($("#level_kepengurusan option:selected").text() == 'Kabupaten'){
                    $("#opsi_level").hide();
                }else if($("#level_kepengurusan option:selected").text() == 'Cabang'){
                    $("#opsi_level").show();   
                    $("#opsi_ranting").hide();
                }else{
                    $("#opsi_level").show(); 
                    $("#opsi_ranting").show();   
                };


            $('#status_kepengurusan').on('change', function() {
                if ( this.value == 'Ya')
                    {
                        $("#opsi_pengurus").show();
                    }
                else
                    {
                        $("#opsi_pengurus").hide();
                        $("#opsi_level").show(); 
                        $("#level_kepengurusan").val('');
                        $("#jabatan_id").val('');
                        $("#unit_id").val('');
                    }
            });

            $('#level_kepengurusan').on('change', function() {
                if ( this.value == 'Kabupaten')
                    {
                        $("#opsi_level").hide();
                        $("#cabang_id").val('');
                        $("#ranting_id").val('');
                    }
                else if ( this.value == 'Cabang'){
                        $("#opsi_level").show();   
                        $("#opsi_ranting").hide();
                        $("#ranting_id").val('');
                        
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




    

