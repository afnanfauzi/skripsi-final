
@extends('layouts.master-blog')
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection
@section('jquery')
<!-- jQuery -->
<script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>   
@endsection
@foreach ($post as $post)
    @section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <!-- post share -->
                    {{-- <div class="section-row">
                        <div class="post-share">
                            <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                            <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                            <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                            <a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
                        </div>
                    </div> --}}
                    <!-- /post share -->

                    <!-- post content -->
                    <div class="section-row">
                        <h1>Daftar Unduhan</h1>
                        <table class="table table-striped table-bordered dt-responsive nowrap" id="table-file" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nama Berkas</th>
                                <th>Unduh</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /post content -->
                    <script>
                    //MULAI DATATABLE
                    //script untuk memanggil data json dari server dan menampilkannya berupa datatable
                    $(document).ready(function () {
                        $('#table-file').DataTable({
                            processing: true,
                            serverSide: true, //aktifkan server-side 
                            ajax: {
                                url: "{{ route('unduhan.blog') }}",
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
                                    data: 'nama_file', 
                                    name: 'nama_file' 
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
                    </script>
                </div>
                @include('blog.sidebar-blog')
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    @endsection

@endforeach
