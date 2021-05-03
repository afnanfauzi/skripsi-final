<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
<link href="{{ asset('css/table-custom.css') }}" rel="stylesheet">
{{-- Custom select --}}
<link href="{{ asset('dashboard/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('dashboard/vendors/select2/dist/js/select2.full.min.js') }}"></script>



@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Daftar Ranting - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Ranting</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="col-md-10">
                                <p>Berikut adalah daftar ranting di Pimpinan Daerah Muhammadiyah Sragen</p>
                              </div>
                              <div class="col-md-2" style="text-align: right;">
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="tambah-ranting"><i class="fa fa-plus"></i> Tambah Ranting</a>
                              </div>
        
                        <table class="table table-striped table-bordered dt-responsive nowrap" id="table-ranting" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nama Ranting</th>
                                <th>Nama Ketua Ranting</th>
                                <th>Jumlah Anggota</th>
                                <th>Status Ranting</th>
                                <th>Cabang</th>
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
                  <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                      <div class="row">
                          <div class="col-sm-12">

                              <input type="hidden" name="id" id="id">

                              <div class="form-group">
                                <label for="nama_ranting" class="col-sm-12 control-label">Nama Ranting</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama_ranting" name="nama_ranting" placeholder="" value="" required="">
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="anggota_id" class="col-sm-12 control-label">Nama Ketua Ranting</label>
                                <div class="col-sm-12">
                                    <select name="anggota_id" id="anggota_id" class="custom-select" style="width: 100%; height: 38px;">
                                        <option value="" holder>Pilih Ketua Ranting</option>
                                        @foreach ($anggota as $anggota)
                                            <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="jmlh_anggota" class="col-sm-12 control-label">Jumlah Anggota</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="jmlh_anggota" name="jmlh_anggota" placeholder="" value="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="nama_ranting" class="col-sm-12 control-label">Status Ranting</label>
                                <div class="col-sm-12">
                                    <select name="status_ranting" id="status_ranting" class="custom-select" style="width: 100%; height: 38px;" required="">
                                        {{-- <option value="" holder>Pilih Status</option> --}}
                                        <option value="Aktif">Aktif</option>
                                        <option value="Kurang Aktif">Kurang Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                        <option value="Tidak Ada Ranting">Tidak Ada Ranting</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="cabang_id" class="col-sm-12 control-label">Cabang</label>
                                <div class="col-sm-12">
                                    <select name="cabang_id" id="cabang_id" class="custom-select" style="width: 100%; height: 38px;" required="">
                                        {{-- <option value="" holder>Pilih Cabang</option> --}}
                                        @foreach ($cabang as $cabang)
                                            <option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div> 

                          </div>
                      </div>

                  
              </div>
              <div class="modal-footer">
                <div class="col-sm-offset-2 col-sm-12">
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
                  <p><b>Jika menghapus data ranting ini maka data tersebut akan hilang selamanya, apakah anda yakin?</b></p>
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


 <!-- MULAI MODAL FORM INFO-->
 {{-- <div class="modal fade" id="tampilkan-info" aria-hidden="true">
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
                            <td width="200px" style="vertical-align: top;"><label for="ranting_info" class="control-label">Nama Ranting</label></td>
                            <td width="5px" style="vertical-align: top;"><label for="ranting_info" class="control-label">:</label></td>
                            <td><label for="kpi_info" class="control-label" id="ranting_info"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="anggota_id_info" class="control-label">Ketua Ranting</label></td>
                            <td style="vertical-align: top;"><label for="anggota_id_info" class="control-label">:</label></td>
                            <td><label for="unit_info" class="control-label" id="anggota_id_info"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="status_ranting_info" class="control-label">Status Ranting</label></td>
                            <td style="vertical-align: top;"><label for="status_ranting_info" class="control-label">:</label></td>
                            <td><label for="rencana_info" class="control-label" id="status_ranting_info" ></label></td>
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
   </div> --}}
<!-- AKHIR MODAL -->

<script>
    $(document).ready(function() {
    $('.custom-select').select2();
});
</script>
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
        //jika tambah-ranting diklik maka
        $('#tambah-ranting').click(function () {
            $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $(".custom-select").val([]).trigger("change"); //Reset Select option
            $('#modal-judul').html("Tambah Ranting"); //valuenya tambah ranting baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
        
        
        });
  
  
  
        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
            $('#table-ranting').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('ranting.index') }}",
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
                        data: 'nama_ranting', 
                        name: 'nama_ranting' 
                    },
                    {
                        data: 'anggota[0].nama_anggota', 
                        name: 'anggota[0].nama_anggota', 
                    },
                    {
                        data: 'jmlh_anggota', 
                        name: 'jmlh_anggota' 
                    },
                    {
                        data: 'status_ranting', 
                        name: 'status_ranting' 
                    },
                    {
                        data: 'cabang.nama_cabang', 
                        name: 'cabang.nama_cabang' 
                    },
                    {
                        data: 'action',
                        name: 'action'
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
            nama_ranting: "required",
            status_ranting: "required",
            cabang_id: "required",
            },
             // Specify validation error messages
            messages: {
                nama_ranting: "Silahkan masukkan nama ranting terlebih dahulu",
                status_ranting: "Silahkan masukkan status ranting terlebih dahulu",
                cabang_id: "Silahkan masukkan cabang dari ranting tersebut",
            },
              submitHandler: function (form) {
                  var actionType = $('#tombol-simpan').val();
                  $('#tombol-simpan').html('Sending..');

                  $.ajax({
                      data: $('#form-tambah-edit').serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                      url: "{{ route('ranting.store') }}", //url simpan data
                      type: "POST", //karena simpan kita pakai method POST
                      dataType: 'json', //data tipe kita kirim berupa JSON
                      success: function (data) { //jika berhasil 
                          $('#form-tambah-edit').trigger("reset"); //form reset
                          $('#tambah-edit-modal').modal('hide'); //modal hide
                          $('#tombol-simpan').html('Simpan'); //tombol simpan
                          var oTable = $('#table-ranting').dataTable(); //inialisasi datatable
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
    
        //TOMBOL EDIT DATA PER ranting DAN TAMPIKAN DATA BERDASARKAN ID ranting KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('ranting/' + data_id + '/edit', function (data) {
                // alert("Data: " + data);
                $('#modal-judul').html("Edit Ranting");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');
  
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#nama_ranting').val(data.nama_ranting);
                // $('#anggota_id').val(data.anggota_id);
                
                $('#jmlh_anggota').val(data.jmlh_anggota);
                // $('#status_ranting').val(data.status_ranting);
                
                // $('#cabang_id').val(data.cabang_id);
                $('#cabang_id').val(data.cabang_id); 
                $('#cabang_id').trigger('change'); // Notify any JS components that the value changed
                $('#status_ranting').val(data.status_ranting); 
                $('#status_ranting').trigger('change'); // Notify any JS components that the value changed
                $('#anggota_id').val(data.anggota_id); 
                $('#anggota_id').trigger('change'); // Notify any JS components that the value changed
            })
        });
  



        //TOMBOL INFO DAN TAMPIKAN DATA BERDASARKAN ID kegiatan KE MODAL
    //   $(document).on("click", ".open-info", function () {
    //     var info_id = $(this).data('id');
    //     $.get('ranting/' + info_id, function(data){
    //         // alert("Data "+data[0]);
    //         $(".modal-body #id_info").val(data[0].id);
    //         $(".modal-body #ranting_info").text(data[0].nama_ranting);
    //         $(".modal-body #anggota_id_info").text(data[0].anggota_id);

    //         // As pointed out in comments, 
    //         // it is unnecessary to have to manually call the modal.
    //         $('#tampilkan-info').modal('show');
    //         $('#modal-judul-info').html("Info Ranting");
    //         // $("#bodyModal").html(html);
            
    //         });
    //     });





        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
  
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
  
                url: "ranting/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table-ranting').dataTable();
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
    

