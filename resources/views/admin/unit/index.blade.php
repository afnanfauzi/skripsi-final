<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Daftar Unit - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2 class="text-uppercase">Daftar Unit</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <div class="col-md-10">
                    <p>Berikut adalah daftar unit di Pimpinan Daerah Muhammadiyah Sragen</p>
                  </div>
                  <div class="col-md-2" style="text-align: right;">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="tambah-unit"><i class="fa fa-plus"></i> Tambah Unit</a>
                  </div>
  
                  <table class="table table-striped table-bordered dt-responsive nowrap" id="table-unit" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Nama Unit</th>
                        <th>Status</th>
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
        

    <!-- MULAI MODAL FORM TAMBAH/EDIT-->
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modal-judul"></h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-sm-12">

                              <input type="hidden" name="id" id="id">

                              <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Nama Unit</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_unit" name="nama_unit" placeholder="" value="" maxlength="50" required="">
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="status" class="col-sm-12 control-label">Status</label>
                                <div class="col-sm-12">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" holder>Pilih Status</option>
                                        <option value="Aktif" >Aktifkan</option>
                                        <option value="Nonaktif" >Nonaktifkan</option>
                                    </select>
                                </div>
                              </div> 
                          </div>
                      </div>

                  
              </div>
              <div class="modal-footer">
                <div class="col-sm-offset-2 col-sm-12" >
                    <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                        value="create">Simpan
                    </button>
                </div>
              </div>
            </form>
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
                  <p><b>Jika menghapus data unit ini maka data tersebut akan hilang selamanya, apakah anda yakin?</b></p>
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
        
        //TOMBOL TAMBAH DATA
        //jika tambah-unit diklik maka
        $('#tambah-unit').click(function () {
            $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Unit"); //valuenya tambah unit baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
        
        
        });
  
  
  
        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
            $('#table-unit').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('unit.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id', 
                        name: 'id', 'visible': false
                    },
                    {
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', orderable: false,searchable: false
                    },
                    {
                        data: 'nama_unit', 
                        name: 'nama_unit' 
                    },
                    {
                        data: 'status', 
                        name: 'status' 
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
  
        //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        $(document).ready(function () {
            if ($("#form-tambah-edit").length > 0) {
          $("#form-tambah-edit").validate({
            rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            nama_unit: "required",
            status: "required",
            },
             // Specify validation error messages
            messages: {
                nama_unit: "Silahkan masukkan nama unit terlebih dahulu",
                status: "Silahkan masukkan status unit terlebih dahulu",
            },
              submitHandler: function (form) {
                  var actionType = $('#tombol-simpan').val();
                  $('#tombol-simpan').html('Sending..');

                  $.ajax({
                      data: $('#form-tambah-edit').serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                      url: "{{ route('unit.store') }}", //url simpan data
                      type: "POST", //karena simpan kita pakai method POST
                      dataType: 'json', //data tipe kita kirim berupa JSON
                      success: function (data) { //jika berhasil 
                          $('#form-tambah-edit').trigger("reset"); //form reset
                          $('#tambah-edit-modal').modal('hide'); //modal hide
                          $('#tombol-simpan').html('Simpan'); //tombol simpan
                          var oTable = $('#table-unit').dataTable(); //inialisasi datatable
                          oTable.fnDraw(false); //reset datatable
                          iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                              title: 'Data Berhasil Disimpan',
                              message: '{{ Session('
                              success ')}}',
                              position: 'bottomRight'
                          });
                      },
                      error: function (data) { //jika error tampilkan error pada console
                          console.log('Error:', data);
                          $('#tombol-simpan').html('Simpan');
                      }
                  });
              }
          })
      }
  
  
        //TOMBOL EDIT DATA PER unit DAN TAMPIKAN DATA BERDASARKAN ID unit KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('unit/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Unit");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');
  
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#nama_unit').val(data.nama_unit);
                $('#status').val(data.status);
                // $('#akun_id').val(data.akun_id);
                // $('#no_telp').val(data.no_telp);
                // $('#alamat').val(data.alamat);
            })
        });
  
        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
  
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
  
                url: "unit/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table-unit').dataTable();
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
    

