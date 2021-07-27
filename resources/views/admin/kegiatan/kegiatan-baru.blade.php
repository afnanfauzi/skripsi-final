<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Select2 -->
<link href="{{ asset('dashboard/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<!-- ckEditor -->
<script src="https://cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
<!-- Parsley -->
<script src="{{ asset('dashboard/vendors/parsleyjs/dist/parsley.min.js') }}"></script>


@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Tambahkan Rencana Kegiatan - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="text-uppercase">Tambahkan Rencana Kegiatan</h2>
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

            <form method="post" action="{{ route('kegiatan.store') }}"   data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="x_content">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kpi">Key Perfomance Indicator <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="kpi" name="kpi" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="unitpelaksana" class="col-form-label col-md-3 col-sm-3 label-align">Unit Pelaksana<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="unitpelaksana" id="unitpelaksana" class="form-control" required="required">
                                    <option value="" holder>Pilih Unit</option>
                                    @foreach ($unit as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="rencana_kegiatan" class="col-form-label col-md-3 col-sm-3 label-align">Rencana Kegiatan</label>
                            <div class="col-md-6 col-sm-6 ">
                                {{-- <textarea class="form-control" id="rencana_kegiatan" name="rencana_kegiatan" maxlength="500" placeholder="" value=""></textarea> --}}
                                <textarea class="form-control" id="rencana_kegiatan" name="rencana_kegiatan"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tahun<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="" value=""  required="required" data-parsley-min="1">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Target</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control" id="target" name="target" placeholder="" value="" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="waktu">Waktu 
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="waktu" name="waktu" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="rab" class="col-form-label col-md-3 col-sm-3 label-align">Rencana Anggaran Biaya</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="rab" class="form-control" type="text" name="rab">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Catatan
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control" id="catatan" name="catatan" placeholder="" maxlength="255" value="">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-info" type="button">Kembali</a>
                            </div>
                        </div>

                    
            
                </div>
            </form>
        </div>
    </div>
        
{{-- </div> --}}


<script>
    CKEDITOR.replace( 'rencana_kegiatan' );
</script>

@endsection




    

