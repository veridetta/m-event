@extends('adminlte::page')

@section('title', 'Manajemen EO')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1 class="m-0 text-dark">Manajemen EO</h1>
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
                <!-- Button trigger modal -->
                <a href="javascript:void(0)" class="btn btn-primary my-3" id="tombol-tambah">Tambah EO</a>
                <br><br>

                <!-- Table -->
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="eo">
                    <thead>
                        <tr>
                            <th scope="col">Nama EO</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
            </div>
                <!-- Table End -->

                <!--Modal Add dan Edit -->
                <div class="modal fade" id="tambah-edit-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                                            <input type="hidden" name="id" id="id">
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Nama EO <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama EO"
                                                        value="" required>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Nomor Telepon <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                <input type="text" name="nomorhp" class="form-control" id="nomorhp"
                                                    placeholder="Nomor Telepon" onkeypress="return onlyNumberKey(event)"
                                                    maxlength="13" minlenght="11" required>
                                                @error('number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Email <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email EO" value=""
                                                        required>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Alamat <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="alamat" class="form-control" id="alamat" name="alamat" placeholder="Alamat EO" value=""
                                                        required>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label" id='lbpass' name='lbpass'>Password <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" placeholder="Password" name="password" required>
                                                        <div class="input-group-append" name='mata' id='mata'>
                                                            <a class="btn btn-default" onclick="myFunction()">
                                                                <i class="fa fa-fw fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{-- 
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Password <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" name="password" required>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> --}}
{{--             
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="konfirmasipass"
                                                    placeholder="Konfirmasi Password" name="password_confirmation">
                                                </div>
                                            </div> --}}

                                            {{-- <div id="showerrorkonfirmasipass"> </div> --}}
            
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <button type="submit" class="btn btn-success btn-block" id="tombol-simpan"
                                                value="create">Simpan
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->

                <!-- Modal Delete -->
                <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="_method" value="DELETE">
                                <p>Kamu yakin ingin menghapus data EO?</p>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger btn" name="tombol-hapus" id="tombol-hapus">Hapus
                                    EO</button>
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

            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
            }
           

            //Tombol Add Data
            $('#tombol-tambah').click(function () {
                $('#button-simpan').val("create-post");
                $('#id').val('');
                $('#form-tambah-edit').trigger("reset");
                $('#modal-judul').html("Tambah EO Baru");
                $('#tambah-edit-modal').modal('show');
            });
            
            //Datatable
            $(document).ready(function () {
                $('#eo').DataTable({
                    processing: true,
                    serverSide: true, 
                    ajax: {
                        url: "{{ route('eo.index') }}",
                        type: 'GET'
                    },
                    columns: [{
                            data: 'name',
                            name: 'name'
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
                            data: 'alamat',
                            name: 'alamat'
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

            //Simpan, Update dan Validasi
            if ($("#form-tambah-edit").length > 0) {
                $("#form-tambah-edit").validate({
                    submitHandler: function (form) {
                        var actionType = $('#tombol-simpan').val();
                        $('#tombol-simpan').html('Sending..');

                        $.ajax({
                            data: $('#form-tambah-edit')
                                .serialize(), 
                            url: "{{ route('eo.store') }}", 
                            type: "POST", 
                            dataType: 'json', 
                            success: function (data) {  
                                $('#form-tambah-edit').trigger("reset"); 
                                $('#tambah-edit-modal').modal('hide'); 
                                $('#tombol-simpan').html('Simpan');
                                var oTable = $('#eo').dataTable();
                                oTable.fnDraw(false);
                                iziToast.success({ 
                                    title: 'Data Berhasil Disimpan',
                                    message: '{{ Session('
                                    success ')}}',
                                    position: 'bottomRight'
                                });
                            },
                            error: function (data) { 
                                console.log('Error:', data);
                                $('#tombol-simpan').html('Simpan');
                            }
                        });
                    }
                })
            }
            
            //Tombol Edit Data
            $('body').on('click', '.edit-post', function () {
                var data_id = $(this).data('id');
                $.get('eo/' + data_id + '/edit', function (data) {
                    $('#modal-judul').html("Ubah EO");
                    $('#tombol-simpan').val("edit-post");
                    $('#tambah-edit-modal').modal('show');
    
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#nomorhp').val(data.nomorhp);
                    $('#alamat').val(data.alamat);
                    $('#email').val(data.email);
                    $('#lbpass').addClass("d-none");
                    $('#password').addClass("d-none");
                    $('#mata').addClass("d-none");
                })
            });

            //modal delete
            $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
            });

            //jika tombol hapus di klik
            $('#tombol-hapus').click(function () {
                $.ajax({
                    url: "eo/" + dataId,
                    type: 'delete',
                    beforeSend: function () {
                        $('#tombol-hapus').text('Hapus EO'); 
                    },
                    success: function (data) { 
                        setTimeout(function () {
                            $('#konfirmasi-modal').modal('hide'); 
                            var oTable = $('#eo').dataTable();
                            oTable.fnDraw(false);
                        });
                        iziToast.warning({
                            title: 'Data Berhasil Dihapus',
                            message: '{{ Session('
                            delete ')}}',
                            position: 'bottomRight'
                        });
                    }
                })
            });        
        </script>
    <!-- JAVASCRIPT -->
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