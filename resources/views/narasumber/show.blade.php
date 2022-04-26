@extends('adminlte::page')

@section('title', 'Manajemen Narasumber Kegiatan')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Narasumber Kegiatan</h1>
@stop

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="narasumber">
                        <thead>
                            <tr>
                                <th scope="col">Nama Narasumber</th>
                                <th scope="col">Kategori Narasumber</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">No. Hp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                <!-- Table End -->

                {{-- Modal Detail --}}
                <div class="modal fade" id="detail-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="userShowModal"></h4>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" name="id" id="detail_id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailNama" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kategori</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailKategori" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Nomor Hp</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailNomorHp" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailEmail" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailJk" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Pendidikan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailPendidikan" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 control-label">Pekerjaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailPekerjaan" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Kota</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailKota" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Provinsi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="detailProvinsi" name="nama" value="" required="" disabled>
                                        </div>
                                    </div>      
                            </div>
                          </div>
                    </div>
                </div>

            </div>
        </div>
    </div>        
    <!-- Akhir Modal -->

    <!--Lib JS -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- JAVASCRIPT -->
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //provinsi
        $(function(){
            $('#provinsi').on('change',function(){
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type : 'POST',
                    url : "{{ route('getkota') }}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,

                    success:function(msg){
                    $('#kota').html(msg);
                    },
                    error: function(data){
                    console.log('error:',data)
                    },
                });
            });
        })

    

        //Datatable
        $(document).ready(function () {
            $('#narasumber').DataTable({
                processing: true,
                serverSide: true, 
                ajax: {
                    url: "{{ route('index5') }}",
                    type: 'GET'
                    },
                columns: [{
                    data: 'nama',
                    name: 'nama'
                    },
                    {
                    data: 'nama_kategori_narasumber',
                    name: 'nama_kategori_narasumber'
                    },
                    {
                    data: 'kota',
                    name: 'kota'
                    },
                    {
                    data: 'provinsi',
                    name: 'provinsi'
                    },
                    {
                    data: 'nomorhp',
                    name: 'nomorhp'
                    },
                    {
                    data: 'email',
                    name: 'email'
                    },
                    {
                    data: 'action',
                    name: 'action'
                    },

                    ],
                    order: [
                        [0, 'asc']
                    ]
            });
        });

    
        //Detail data
        $('body').on('click', '.detail-narasumber', function () {
            var data_id = $(this).data('id');
            $.get('narasumber/'+data_id, function(data) {
                $('#userShowModal').html("Detail Narasumber Kegiatan");
                $('#detail-modal').modal('show');
                
                $('#detail_id').val(data.id);
                $('#detailNama').val(data.nama);
                $('#detailKategori').val(data.nama_kategori_narasumber);
                $('#detailNomorHp').val(data.nomorhp);
                $('#detailEmail').val(data.email);
                $('#detailJk').val(data.jk);
                $('#detailPendidikan').val(data.pendidikan);
                $('#detailPekerjaan').val(data.pekerjaan);
                $('#detailKota').val(data.kota);
                $('#detailProvinsi').val(data.provinsi);
            });
        });

       

        
    </script>
    <!-- END JAVASCRIPT -->
    <footer id="footer">
        <style>
            .footer {
              position: fixed;
              left: 0;
              bottom: 0;
              width: 100%;
              background-color: #f8f9fa;
              color: grey;
              text-align: center;
            }
            </style>
            
            <br>
            <div class="footer">
                <div class="copyright">
                  &copy; Copyright <strong><span>Manajement Event <a href="https://spero.id/">Spero</a></span></strong>. All Rights Reserved
              </div>
            <br>     
    </div>
@endsection