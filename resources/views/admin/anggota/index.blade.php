<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
<link href="{{ asset('css/table-custom.css') }}" rel="stylesheet">
@extends('layouts.master')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('title', 'Daftar Anggota - Pimpinan Daerah Muhammadiyah Sragen')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Anggota</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <div class="col-md-10">
                    <p>Berikut adalah daftar anggota tiap unit</p>
                  </div>
                  <div class="col-md-2" style="text-align: right;">
                    <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-sm" id="tambah-anggota"><i class="fa fa-plus"></i> Tambah Anggota</a>
                  </div>
  
                  <table class="table table-striped table-bordered dt-responsive nowrap" id="table-anggota" style="width:100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Unit</th>
                        <th>Alamat</th>
                        <th>No HP</th>
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
                  <p><b>Jika menghapus data anggota ini maka data tersebut akan hilang selamanya, apakah anda yakin?</b></p>
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
   <div class="modal fade" id="tampilkan-info" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul-info"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="column">
                      <table style="font-size: 15px;">
                        <tr>
                            <td width="200px"><label for="id" class="control-label">ID Anggota</label></td>
                            <td><label for="id" class="control-label">:</label></td>
                            <td><label for="id" class="control-label" id="id"></label></td>
                        </tr>
                        <tr>
                            <td width="200px" style="vertical-align: top;"><label for="nama_anggota" class="control-label">Nama Anggota</label></td>
                            <td style="vertical-align: top;"><label for="nama_anggota" class="control-label">:</label></td>
                            <td><label for="nama_anggota" class="control-label" id="nama_anggota"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="unit" class="control-label">Unit</label></td>
                            <td style="vertical-align: top;"><label for="unit" class="control-label">:</label></td>
                            <td><label for="unit" class="control-label" id="unit"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="jabatan" class="control-label">Jabatan</label></td>
                            <td style="vertical-align: top;"><label for="jabatan" class="control-label">:</label></td>
                            <td><label for="jabatan" class="control-label" id="jabatan" ></label></td>

                        </tr>
                        <tr>
                            <td><label for="tgl_lahir" class="control-label">Tanggal Lahir</label></td>
                            <td><label for="tgl_lahir" class="control-label">:</label></td>
                            <td><label for="tgl_lahir" class="control-label" id="tgl_lahir"></label></td>
                        </tr>
                        <tr>
                            <td><label for="jenkel" class="control-label">Jenis Kelamin</label></td>
                            <td> <label for="jenkel" class="control-label">:</label></td>
                            <td><label for="jenkel" class="control-label" id="jenkel"></label></td>
                        </tr>
                        <tr>
                            <td><label for="no_telp" class="control-label">No Telepon</label></td>
                            <td><label for="no_telp" class="control-label">:</label></td>
                            <td><label for="no_telp" class="control-label" id="no_telp"></label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;"><label for="alamat" class="control-label">Alamat</label></td>
                            <td style="vertical-align: top;"><label for="alamat" class="control-label">:</label></td>
                            <td><label for="alamat" class="control-label" id="alamat"></label></td>
                        </tr>
                      </table>
                    </div>
                    <div class="column">
                      <table>
                        <td ><img id="gambar" width="150" style="display: block; margin-left: auto; margin-right: auto; border: 5px solid #555;"/></td>
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
            $('#table-anggota').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('anggota.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id', 
                        name: 'id', 'visible': false
                    },
                    {
                        data: 'akun_id', 
                        name: 'akun_id'
                    },
                    {
                        data: 'nama_anggota', 
                        name: 'nama_anggota' 
                    },
                    {
                        data: 'units.nama_unit', 
                        name: 'units.nama_unit'
                    },
                    {
                        data: 'alamat', 
                        name: 'alamat' 
                    },
                    {
                        data: 'no_telp', 
                        name: 'no_telp' 
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
  
        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
  
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
  
                url: "anggota/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table-anggota').dataTable();
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



        //TOMBOL INFO DAN TAMPIKAN DATA BERDASARKAN ID kegiatan KE MODAL
      $(document).on("click", ".open-info", function () {
        var info_id = $(this).data('id');
        $.get('anggota/' + info_id + '/info', function(data){
            
            $(".modal-body #id").val( data[0].id );
            $(".modal-body #id").text(data[0].akun_id);
            $(".modal-body #nama_anggota").text(data[0].nama_anggota);
            $(".modal-body #unit").text( data[0].units['nama_unit'] );
            $(".modal-body #jabatan").text( data[0].jabatan['nama_jabatan'] );
            $(".modal-body #tgl_lahir").text( data[0].tgl_lahir);
            $(".modal-body #jenkel").text( data[0].jenkel);
            $(".modal-body #no_telp").text( data[0].no_telp );
            $(".modal-body #alamat").text( data[0].alamat );
            // $(".modal-body #foto").prop('<img src="'+data[0].gambar+'"/>');
            $(".modal-body #gambar").attr("src","{{asset('storage/gambar')}}"+'/'+data[0].gambar);
            
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            $('#tampilkan-info').modal('show');
            $('#modal-judul-info').html("Info Anggota");
            // $("#bodyModal").html(html);
            
            });
        });
        
      });
  
    </script>
  
    <!-- JAVASCRIPT -->
    

