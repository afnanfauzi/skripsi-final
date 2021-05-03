<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Dashboard - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="col-12">
    <!-- top tiles -->
    <div class="row-nan" style="display: inline-block;" >
    <div class="tile_count">
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-briefcase"></i> Total Kegiatan</span>
        <div class="count green">{{ $kegiatan }}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Anggota</span>
        <div class="count green">{{ $anggota }}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-building-o"></i> Total Unit</span>
        <div class="count green">{{ $unit }}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-institution"></i> Total Cabang</span>
        <div class="count green">{{ $cabang }}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-university"></i> Total Ranting</span>
        <div class="count green">{{ $ranting }}</div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-dribbble"></i> Total Artikel</span>
        <div class="count green">{{ $artikel }}</div>
      </div>
    </div>
  </div>
    <!-- /top tiles -->
</div>

@endsection
