<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
<link href="{{ asset('css/table-custom.css') }}" rel="stylesheet">
@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Kegiatan - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Kegiatan</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <div class="col-md-12">
                    <div class="col-md-4">
                        <label for="filter_unitpelaksana"><b> Filter Berdasarkan Tahun : </b></label>
                            <p id="selectTriggerFilter2"></p>
                    </div>
                    <div class="col-md-4">
                        <label for="filter_unitpelaksana"><b> Filter Berdasarkan Unit : </b></label>
                        <p id="selectTriggerFilter"></p>
                    </div>
                    <div class="col-md-4" style="text-align: right; padding-top: 27px">
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-sm" id="tambah-kegiatan"><i class="fa fa-plus"></i> Tambah Rencana Kegiatan</a>
                    </div>
                    </div>
  
                  <table class="table table-striped table-bordered dt-responsive" cellspacing="0" id="table-kegiatan" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Key Performance Indicator</th>
                        <th>Unit Pelaksana</th>
                        <th>Rencana Kegiatan</th>
                        <th>Tahun</th>
                        <th>Target</th>
                        <th>Waktu</th>
                        <th>RAB</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                        
                    </tr>
                    </thead>
                    </table>

                 </div>
               </div>
            </div>
        </div> 
    </div>
  </div> 

   <!-- MULAI MODAL FORM INFO-->
   <div class="modal fade" id="tampilkan-info" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul-info"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="column-kegiatan">
                        <input type="hidden" name="id_info" id="id_info" value="">
                      <table style="font-size: 15px;">
                        <tr>
                            <td width="200px" style="vertical-align: top;"><label for="kpi_info" class="control-label">Key Performance Indicator</label></td>
                            <td width="5px" style="vertical-align: top;"><label for="kpi_info" class="control-label">:</label></td>
                            <td><label for="kpi_info" class="control-label" id="kpi_info"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="unit_info" class="control-label">Unit Pelaksana</label></td>
                            <td style="vertical-align: top;"><label for="unit_info" class="control-label">:</label></td>
                            <td><label for="unit_info" class="control-label" id="unit_info"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="rencana_info" class="control-label">Rencana Kegiatan</label></td>
                            <td style="vertical-align: top;"><label for="rencana_info" class="control-label">:</label></td>
                            <td><label for="rencana_info" class="control-label" id="rencana_info" ></label></td>

                        </tr>
                        <tr>
                            <td><label for="tahun_info" class="control-label">Tahun</label></td>
                            <td><label for="tahun_info" class="control-label">:</label></td>
                            <td><label for="tahun_info" class="control-label" id="tahun_info"></label></td>
                        </tr>
                        <tr>
                            <td><label for="target_info" class="control-label">Target</label></td>
                            <td> <label for="target_info" class="control-label">:</label></td>
                            <td><label for="target_info" class="control-label" id="target_info"></label></td>
                        </tr>
                        <tr>
                            <td><label for="waktu_info" class="control-label">Waktu</label></td>
                            <td><label for="waktu_info" class="control-label">:</label></td>
                            <td><label for="waktu_info" class="control-label" id="waktu_info"></label></td>
                        </tr>
                        <tr>
                            <td><label for="rab_info" class="control-label">Rencana Anggaran Biaya</label></td>
                            <td><label for="rab_info" class="control-label">:</label></td>
                            <td><label for="rab_info" class="control-label" id="rab_info"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="catatan_info" class="control-label">Catatan</label></td>
                            <td style="vertical-align: top;"><label for="catatan_info" class="control-label">:</label></td>
                            <td><label for="catatan_info" class="control-label" id="catatan_info"></label></td>
                        </tr>
                      </table>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
   </div>
<!-- AKHIR MODAL -->




  <!-- MULAI MODAL KONFIRMASI DELETE-->

  <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">PERHATIAN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p><b>Jika menghapus data kegiatan ini maka data tersebut akan hilang selamanya, apakah anda yakin?</b></p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                      Data</button>
              </div>
          </div>
      </div>
  </div>

  <!-- AKHIR MODAL -->
@endsection


    <!-- JAVASCRIPT -->
    <script>
      //CSRF TOKEN PADA HEADER
      //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
      $(document).ready(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
            
      });



      //MULAI DATATABLE
      //script untuk memanggil data json dari server dan menampilkannya berupa datatable
      $(document).ready(function () {
            $('#table-kegiatan').DataTable({
            //     dom: '<"html5buttons">Blfrtip',
            language: {
                    buttons: {
                        // collection : 'Unduh',
                        pdf:'Unduh',
                        print : 'Cetak',
                    }
            },
            
            buttons : [
                        // {extend:'collection', postfixButtons: [ 'pdf', 'excel', 'csv' ]},
                        {extend:'pdf',title: 'Laporan Daftar Kegiatan Pimpinan Daerah Muhammadiyah Sragen', exportOptions: {
                        columns: [ 1, 2, 3, 4, 6, 7, 8, 9 ]}},
                        {extend:'print',title: 'Laporan Daftar Kegiatan Pimpinan Daerah Muhammadiyah Sragen', exportOptions: {
                        columns: [ 1, 2, 3, 4, 6, 7, 8, 9 ]}},
                        {extend:'pageLength'},
            ],

            lengthChange: false,
            // buttons: [ 'copy', 'excel', 'pdf', 'csv', 'pageLength' ],
                initComplete: function () {
                    this.api().buttons().container() //untuk tombol unduh dan cetak
                    .appendTo( '#table-kegiatan_wrapper .col-sm-6:eq(0)' ); 

                    //untuk filter unit
                    var column = this.api().column(3);

                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo('#selectTriggerFilter')
                        .on('change', function() {
                        var val = $(this).val();
                        column.search(val).draw()
                        });

                    var unit = []; 
                    column.data().toArray().forEach(function(s) {
                            s = s.split(',');
                        s.forEach(function(d) {
                            if (!~unit.indexOf(d)) {
                                unit.push(d)
                            select.append('<option value="' + d + '">' + d + '</option>');                         }
                        })
                    });


                      //untuk filter tahun
                    var column2 = this.api().column(5);

                    var select2 = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo('#selectTriggerFilter2')
                        .on('change', function() {
                        var val = $(this).val();
                        column2.search(val).draw()
                        });

                    var tahun = []; 
                    column2.data().toArray().forEach(function(s) {
                            s = s.split(',');
                        s.forEach(function(d) {
                            if (!~tahun.indexOf(d)) {
                                tahun.push(d)
                            select2.append('<option value="' + d + '">' + d + '</option>');                         }
                        })
                    })      



            },
                processing: true,
                serverSide: true, //aktifkan server-side 
              ajax: {
                  url: "{{ route('kegiatan.index') }}",
                  type: 'GET',
              },
              columns: [{
                      data: 'id', 
                      name: 'id', 'visible': false
                  },
                  {
                      data: 'DT_RowIndex', 
                      name: 'DT_RowIndex', 
                      orderable: false,searchable: false
                  },
                  {
                      data: 'kpi', 
                      name: 'kpi' 
                  },
                  {
                      data: 'units.nama_unit', 
                      name: 'units.nama_unit'
                  },
                  {
                      data: 'rencana_kegiatan', 
                      name: 'rencana_kegiatan',
                      'visible': false 
                  },
                  {
                      data: 'tahun', 
                      name: 'tahun' 
                  },
                  {
                      data: 'target', 
                      name: 'target', 
                      'visible': false 
                  },
                  {
                      data: 'waktu', 
                      name: 'waktu',
                      'visible': false  
                  },
                  {
                      data: 'rab', 
                      name: 'rab',
                      'visible': false 
                  },
                  {
                      data: 'catatan', 
                      name: 'catatan',
                      orderable: false,searchable: false, 'visible': false 
                  },
                  {
                      data: 'action',
                      name: 'action',
                      orderable: false,searchable: false
                  },
                  

              ],
              order: [
                  [0, 'desc']
              ]
          });

      });

     
      $(document).ready(function () {

      //TOMBOL INFO DAN TAMPIKAN DATA BERDASARKAN ID kegiatan KE MODAL
      $(document).on("click", ".open-info", function () {
        var info_id = $(this).data('id');
        $.get('kegiatan/' + info_id + '/info', function(data){
            $(".modal-body #id_info").val(data[0].id);
            $(".modal-body #kpi_info").text(data[0].kpi);
            $(".modal-body #unit_info").text( data[0].units['nama_unit'] );
            $(".modal-body #rencana_info").html( data[0].rencana_kegiatan );
            $(".modal-body #tahun_info").text( data[0].tahun);
            $(".modal-body #target_info").text( data[0].target);
            $(".modal-body #waktu_info").text( data[0].waktu );
            $(".modal-body #rab_info").text( data[0].rab );
            $(".modal-body #catatan_info").text( data[0].catatan );

            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            $('#tampilkan-info').modal('show');
            $('#modal-judul-info').html("Info Kegiatan");
            // $("#bodyModal").html(html);
            
            });
        });



      //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
      $(document).on('click', '.delete', function () {
          dataId = $(this).attr('id');
          $('#konfirmasi-modal').modal('show');
      });

      //jika tombol hapus pada modal konfirmasi di klik maka
      $('#tombol-hapus').click(function () {
          $.ajax({

              url: "kegiatan/" + dataId, //eksekusi ajax ke url ini
              type: 'delete',
              beforeSend: function () {
                  $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
              },
              success: function (data) { //jika sukses
                  setTimeout(function () {
                      $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                      var oTable = $('#table-kegiatan').dataTable();
                      oTable.fnDraw(false); //reset datatable
                  });
                  iziToast.warning({ //tampilkan izitoast warning
                      title: 'Data Berhasil Dihapus',
                      message: '{{ Session('
                      delete ')}}',
                      position: 'bottomRight'
                  });
              }
          })
      });
    });

  </script>

  <!-- JAVASCRIPT -->



