@extends('adminlte::page')

@section('title', 'Manajemen Pertanyaan Efektivitas')

@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Pertanyaan Efektivitas</h1>
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
                    <a href="javascript:void(0)" class="btn btn-primary my-3" id="tombol-tambah">Tambah Pertanyaan</a>
                    <br><br>
    
                    <!-- Table -->
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="table_pp">
                        <thead>
                            <tr>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    </div>
                </div>
                <!-- Table End -->
              </div>
            </div>
                <!-- Table End -->

                <!--Modal Add -->
                <div class="modal fade" id="tambah-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul">Tambah Pertanyaan</h5> <br><br>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="form-tambah" name="form-tambah" class="form-horizontal" method="POST" action="">
                                    {{ csrf_field() }}        
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-sm-12"> 
                                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Minimal 1 pertanyaan</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="kegiatan" class="col-sm-12 control-label">Nama Kegiatan<span class="text-danger"> *</span></label>
                                        <div class="col-sm-12">
                                        <select name="kegiatan" id="kegiatan" class="form-control" data-width="100%">
                                            <option disabled value>--Pilih Kegiatan--</option>
                                            @foreach ($kegiatan as $event)
                                                <option value="{{ $event->id_kegiatan }}">{{ $event->namakegiatan }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan<span class="text-danger"> *</span></label>
                                        <div class="col-sm-12">
                                            <select name="kategori1" id="kategori1" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Kategori Pertanyaan 1 Harus Dokumen
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 1<span class="text-danger"> *</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan1" name="pertanyaan1" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formkat2" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori2" id="kategori2" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Kategori Pertanyaan 2 Harus Dokumen
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya2" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 2</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan2" name="pertanyaan2" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formkat3" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan</label>
                                        <div class="col-sm-12">
                                            <select name="kategori3" id="kategori3" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya3" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 3</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan3" name="pertanyaan3" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formkat4" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori4" id="kategori4" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya4" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 4 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan4" name="pertanyaan4" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group" id="formkat5" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori5" id="kategori5" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya5" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 5 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan5" name="pertanyaan5" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group" id="formkat6" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori6" id="kategori6" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya6" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 6 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan6" name="pertanyaan6" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group" id="formkat7" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori7" id="kategori7" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya7" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 7 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan7" name="pertanyaan7" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group" id="formkat8" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori8" id="kategori8" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya8" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 8 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan8" name="pertanyaan8" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group" id="formkat9" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori9" id="kategori9" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya9" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 9 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan9" name="pertanyaan9" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group" id="formkat10" hidden>
                                        <label for="name" class="col-sm-12 control-label">Kategori Pertanyaan </label>
                                        <div class="col-sm-12">
                                            <select name="kategori10" id="kategori10" class="form-control required" data-width="100%">
                                                <option disabled value>--Pilih Kategori Pertanyaan--</option>
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                                @endforeach
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger">
                                                *Essay atau Pilihan saja
                                            </small>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya10" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 10 </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan10" name="pertanyaan10" placeholder="Pertanyaan"
                                                value="" required>
                                        </div>
                                    </div>

                                            <div class="form-group" id="tmbh2">
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan2" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh3" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan3" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh4" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan4" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh5" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan5" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh6" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan6" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh7" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan7" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh8" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan8" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh9" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan9" value="tambah"><i class="fa fa-plus">Tambah</i></button>
                                            </div>
                                            <div class="form-group" id="tmbh10" hidden>
                                                <button type="button" class="btn btn-link" id="tambah-pertanyaan10" value="tambah"><i class="fa fa-plus">Tambah</i></button>
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
                                <p>Kamu yakin ingin menghapus data Pertanyaan?</p>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary btn" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger btn" name="tombol-hapus" id="tombol-hapus">Hapus
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->

                <!--Modal Show -->
                <div class="modal fade" id="detail-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showmodal">Detail Pertanyaan</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body table-responsive" id="detail_id">
                                <table class="table">
                                    <tbody>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Kegiatan</label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailkegiatan" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">List Pertanyaan</label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan2" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan3" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan4" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan5" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan6" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan7" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan8" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan9" value="">
                                            </div>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="detailpertanyaan10" value="">
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

            //Datatable
            $(document).ready(function () {
                $('#table_pp').DataTable({
                    processing: true,
                    serverSide: true, 
                    ajax: {
                        url: "{{ route('efektivitas.index') }}",
                        type: 'GET'
                    },
                    columns: [{
                            data: 'kegiatan',
                            name: 'kegiatan'
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

            //Tombol Add Data
            $('#tombol-tambah').click(function () {
                $('#button-simpan').val("create-post");
                $('#id').val('');
                $('#form-tambah').trigger("reset");
                $('#modal-judul').html("Tambah Pertanyaan Baru");
                $('#tambah-modal').modal('show');

                $('#kegiatan').val(data.kegiatan);
                $('#pertanyaan1').val(data.pertanyaan1);
                $('#pertanyaan2').val(data.pertanyaan2);
                $('#pertanyaan3').val(data.pertanyaan3);
                $('#pertanyaan4').val(data.pertanyaan4);
                $('#pertanyaan5').val(data.pertanyaan5);
                $('#pertanyaan6').val(data.pertanyaan6);
                $('#pertanyaan7').val(data.pertanyaan7);
                $('#pertanyaan8').val(data.pertanyaan8);
                $('#pertanyaan9').val(data.pertanyaan9);
                $('#pertanyaan10').val(data.pertanyaan10);
                $('#kategori1').val(data.kategori1);
                $('#kategori2').val(data.kategori2);
                $('#kategori3').val(data.kategori3);
                $('#kategori4').val(data.kategori4);
                $('#kategori5').val(data.kategori5);
                $('#kategori6').val(data.kategori6);
                $('#kategori7').val(data.kategori7);
                $('#kategori8').val(data.kategori8);
                $('#kategori9').val(data.kategori9);
                $('#kategori10').val(data.kategori10);
            });

            //Tombol Add Pertanyaan
            $('#tambah-pertanyaan2').click(function () {
                $('#formkat2').addClass("d-block");
                $('#formtanya2').addClass("d-block");
                $('#tmbh2').addClass("d-none");
                $('#tmbh3').addClass("d-block");
            });

            $('#tambah-pertanyaan3').click(function () {
                $('#formkat3').addClass("d-block");
                $('#formtanya3').addClass("d-block");
                $('#tambah-pertanyaan3').addClass("d-none");
                $('#tmbh4').addClass("d-block");
            });

            $('#tambah-pertanyaan4').click(function () {
                $('#formkat4').addClass("d-block");
                $('#formtanya4').addClass("d-block");
                $('#tambah-pertanyaan4').addClass("d-none");
                $('#tmbh5').addClass("d-block");
            });

            $('#tambah-pertanyaan5').click(function () {
                $('#formkat5').addClass("d-block");
                $('#formtanya5').addClass("d-block");
                $('#tambah-pertanyaan5').addClass("d-none");
                $('#tmbh6').addClass("d-block");
            });

            $('#tambah-pertanyaan6').click(function () {
                $('#formkat6').addClass("d-block");
                $('#formtanya6').addClass("d-block");
                $('#tambah-pertanyaan6').addClass("d-none");
                $('#tmbh7').addClass("d-block");
            });

            $('#tambah-pertanyaan7').click(function () {
                $('#formkat7').addClass("d-block");
                $('#formtanya7').addClass("d-block");
                $('#tambah-pertanyaan7').addClass("d-none");
                $('#tmbh8').addClass("d-block");
            });

            $('#tambah-pertanyaan8').click(function () {
                $('#formkat8').addClass("d-block");
                $('#formtanya8').addClass("d-block");
                $('#tambah-pertanyaan8').addClass("d-none");
                $('#tmbh9').addClass("d-block");
            });

            $('#tambah-pertanyaan9').click(function () {
                $('#formkat9').addClass("d-block");
                $('#formtanya9').addClass("d-block");
                $('#tambah-pertanyaan9').addClass("d-none");
                $('#tmbh10').addClass("d-block");
            });

            $('#tambah-pertanyaan10').click(function () {
                $('#formkat10').addClass("d-block");
                $('#formtanya10').addClass("d-block");
                $('#tambah-pertanyaan10').addClass("d-none");
            });
            //end add pertanyaan

            //Simpan, Update dan Validasi
            if ($("#form-tambah").length > 0) {
                $("#form-tambah").validate({
                    submitHandler: function (form) {
                        var actionType = $('#tombol-simpan').val();
                        $('#tombol-simpan').html('Sending..');

                        $.ajax({
                            data: $('#form-tambah')
                                .serialize(), 
                            url: "{{ route('efektivitas.store') }}", 
                            type: "POST", 
                            dataType: 'json', 
                            success: function (data) {  
                                $('#form-tambah').trigger("reset"); 
                                $('#tambah-modal').modal('hide'); 
                                $('#tombol-simpan').html('Simpan');
                                var oTable = $('#table_pp').dataTable();
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
                $.get('efektivitas/' + data_id + '/edit', function (data) {
                    $('#modal-judul').html("Edit Pertanyaan");
                    $('#tombol-simpan').val("edit-post");
                    $('#tambah-modal').modal('show');

                    $('#id').val(data.id);
                    $('#kegiatan').val(data.kegiatan);
                    $('#pertanyaan1').val(data.pertanyaan1);
                    $('#pertanyaan2').val(data.pertanyaan2);
                    $('#pertanyaan3').val(data.pertanyaan3);
                    $('#pertanyaan4').val(data.pertanyaan4);
                    $('#pertanyaan5').val(data.pertanyaan5);
                    $('#pertanyaan6').val(data.pertanyaan6);
                    $('#pertanyaan7').val(data.pertanyaan7);
                    $('#pertanyaan8').val(data.pertanyaan8);
                    $('#pertanyaan9').val(data.pertanyaan9);
                    $('#pertanyaan10').val(data.pertanyaan10);
                    $('#kategori1').val(data.kategori1);
                    $('#kategori2').val(data.kategori2);
                    $('#kategori3').val(data.kategori3);
                    $('#kategori4').val(data.kategori4);
                    $('#kategori5').val(data.kategori5);
                    $('#kategori6').val(data.kategori6);
                    $('#kategori7').val(data.kategori7);
                    $('#kategori8').val(data.kategori8);
                    $('#kategori9').val(data.kategori9);
                    $('#kategori10').val(data.kategori10); 
                })
            });

            //Detail Data
            $('body').on('click', '.detail-modal', function () {
                    var data_id = $(this).data('id');
                    cache: false,
                    $.get('efektivitas/'+data_id, function(data) {
                        $('#showmodal').html("Detail Pertanyaan");
                        $('#detail-modal').modal('show');
                    
                        $('#id').val(data.id);
                        $('#detailkegiatan').val(data.kegiatan);
                        $('#detailpertanyaan').val(data.pertanyaan1);
                        $('#detailpertanyaan2').val(data.pertanyaan2);
                        $('#detailpertanyaan3').val(data.pertanyaan3);
                        $('#detailpertanyaan4').val(data.pertanyaan4);
                        $('#detailpertanyaan5').val(data.pertanyaan5);
                        $('#detailpertanyaan6').val(data.pertanyaan6);
                        $('#detailpertanyaan7').val(data.pertanyaan7);
                        $('#detailpertanyaan8').val(data.pertanyaan8);
                        $('#detailpertanyaan9').val(data.pertanyaan9);
                        $('#detailpertanyaan10').val(data.pertanyaan10);
                    });
                });


            //modal delete
            $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
            });

            //jika tombol hapus di klik
            $('#tombol-hapus').click(function () {
                $.ajax({
                    url: "efektivitas/" + dataId,
                    type: 'delete',
                    beforeSend: function () {
                        $('#tombol-hapus').text('Hapus Data'); 
                    },
                    success: function (data) { 
                        setTimeout(function () {
                            $('#konfirmasi-modal').modal('hide'); 
                            var oTable = $('#table_pp').dataTable();
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
@endsection