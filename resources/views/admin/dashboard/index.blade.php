<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
{{-- Custom css cards --}}
<link href="{{ asset('dashboard/build/css/dashboard-admin/bootstrap-extended.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/build/css/dashboard-admin/colors.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/build/css/dashboard-admin/style.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/build/css/dashboard-admin/bootstrap.min.css') }}" rel="stylesheet">

@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Dashboard - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="col-12">
    <div class="grey-bg container-fluid">
      <section id="minimal-statistics">
        <div class="row">
          <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Dashboard</h4>
          </div>
        </div>
      
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $kegiatan }}</h3>
                      <span>Total Kegiatan</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-briefcase danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">{{ $anggota }}</h3>
                      <span>Total Anggota</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-users success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">{{ $anggota_aktif }}</h3>
                      <span>Anggota Aktif</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-user warning font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="primary">{{ $artikel }}</h3>
                      <span>Total Artikel</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-globe primary font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>



</div>

@endsection
