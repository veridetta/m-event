@extends('adminlte::page')

@section('title', 'Manajemen Pengawas')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Pengawas</h1>
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
                <a href="javascript:void(0)" class="btn btn-primary my-3" id="tombol-tambah">Tambah Pengawas</a>
                <br><br>

                <!-- Table -->
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="table_pengawas">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Status</th>
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
                                                <label for="name" class="col-sm-12 control-label">Nama Pengawas<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengawas"
                                                        value="" required>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">No Telephone<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                <input type="text" name="NoHp" class="form-control" id="NoHp"
                                                    placeholder="No. Telephone" onkeypress="return onlyNumberKey(event)"
                                                    maxlength="14" minlenght="11" required>
                                                @error('number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">E-mail<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <input type="email" class="form-control" id="email" name="email" value="" placeholder="E-Mail"
                                                        required>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Jenis Kelamin<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control required">
                                                        <option value="">--Pilih Jenis Kelamin--</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Provinsi</label>
                                                <div class="col-sm-12">
                                                    <select name="Provinsi" id="Provinsi" class="form-control required" data-width="100%">
                                                        <option>--Pilih Provinsi--</option>
                                                        @foreach ($provinces as $Provinsi)
                                                            <option value="{{ $Provinsi->id }}">{{ $Provinsi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Kota</label>
                                                <div class="col-sm-12">
                                                    <select name="Kota" id="Kota" class="form-control" data-width="100%">
                                                        <option value="">--Pilih Kota--</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label">Status<span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <select name="Status_Aktif" id="Status_Aktif" class="form-control required">
                                                        <option value="">--Status--</option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Non-Aktif">Non-Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="name" class="col-sm-12 control-label" id='lbpass' name='lbpass'>Password<span class="text-danger"> *</span></label>
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
                <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false" width="100%">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="_method" value="DELETE">
                                <p>Kamu yakin ingin menghapus data Pengawas?</p>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger btn" name="tombol-hapus" id="tombol-hapus">Hapus
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Modal Show -->
                <div class="modal fade" id="detail-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showmodal">Detail Pengawas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body table-responsive" id="detail_id">
                                <table class="table">
                                    <tbody>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailnama" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">No Hp</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailhp" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailemail" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailjk" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Provinsi</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailprov" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Kota</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailkota" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-7">
                                              <input type="text" readonly class="form-control-plaintext" id="detailstatus" value="">
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->

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
                // $('#Provinsi').select2();
                // $('#Kota').select2();
            });

            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
            }

             //provinsi
             $(function(){
                $('#Provinsi').on('change',function(){
                    let id_provinsi = $('#Provinsi').val();

                    //console.log(id_provinsi);
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('getkota') }}",
                        data : {id_provinsi:id_provinsi},
                        cache : false,

                        success:function(msg){
                            $('#Kota').html(msg);
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    });
                });
            })

            //Detail Data
            $('body').on('click', '.detail-modal', function () {
                    var data_id = $(this).data('id');
                    cache: false,
                    $.get('pengawas/'+data_id, function(data) {
                        $('#showmodal').html("Detail Pengawas");
                        $('#detail-modal').modal('show');
                    
                        $('#id').val(data.id);
                        $('#detailnama').val(data.name);
                        $('#detailhp').val(data.NoHp);
                        $('#detailemail').val(data.email);
                        $('#detailjk').val(data.jenis_kelamin);
                        $('#detailprov').val(data.Provinsi);
                        $('#detailkota').val(data.Kota);
                        $('#detailstatus').val(data.Status_Aktif);
                    
                    });
            });
            
            //Tombol Add Data
            $('#tombol-tambah').click(function () {
                $('#button-simpan').val("create-post");
                $('#id').val('');
                $('#form-tambah-edit').trigger("reset");
                $('#modal-judul').html("Tambah Pengawas Baru");
                $('#tambah-edit-modal').modal('show');
            });
            
            //Datatable
            $(document).ready(function () {
                $('#table_pengawas').DataTable({
                    processing: true,
                    serverSide: true, 
                    ajax: {
                        url: "{{ route('pengawas.index') }}",
                        type: 'GET'
                    },
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'NoHp',
                            name: 'NoHp'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin'
                        },
                        {
                            data: 'Status_Aktif',
                            name: 'Status_Aktif'
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
                            url: "{{ route('pengawas.store') }}", 
                            type: "POST", 
                            dataType: 'json', 
                            success: function (data) {  
                                $('#form-tambah-edit').trigger("reset"); 
                                $('#tambah-edit-modal').modal('hide'); 
                                $('#tombol-simpan').html('Simpan');
                                var oTable = $('#table_pengawas').dataTable();
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
                $.get('pengawas/' + data_id + '/edit', function (data) {
                    $('#modal-judul').html("Edit Post");
                    $('#tombol-simpan').val("edit-post");
                    $('#tambah-edit-modal').modal('show');
    
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#NoHp').val(data.NoHp);
                    $('#email').val(data.email);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#Provinsi').val(data.Provinsi);
                    $('#Kota').val(data.Kota);
                    $('#Status_Aktif').val(data.Status_Aktif);
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
                    url: "pengawas/" + dataId,
                    type: 'delete',
                    beforeSend: function () {
                        $('#tombol-hapus').text('Hapus Data'); 
                    },
                    success: function (data) { 
                        setTimeout(function () {
                            $('#konfirmasi-modal').modal('hide'); 
                            var oTable = $('#table_pengawas').dataTable();
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
