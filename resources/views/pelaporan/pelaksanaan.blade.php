@extends('adminlte::page')

@section('title', 'Manajemen Pelaporan Pelaksanaan')

@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Pelaporan Pelaksanaan</h1>
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

                <!--Modal Add -->
                <div class="modal fade" id="tambah-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul">Tambah Pelaporan</h5> <br><br>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="form-tambah" name="form-tambah" enctype="multipart/form-data" class="form-horizontal" method="POST" action="">
                                    {{ csrf_field() }}        
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="kegiatan" class="col-sm-12 control-label">Nama Kegiatan</label>
                                        <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" readonly
                                            value="">
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 1</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan1" name="pertanyaan1" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="file" name="jawaban" id="jawaban" accept=".png, .jpeg, .jpg" data-allowed-file-extensions='["png", "jpeg", "jpg"]' id="input-file-now" class="dropify" data-max-file-size="3000K" />
                                            <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (png, jpeg, jpg)</p>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya2" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 2</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan2" name="pertanyaan2" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab2" hidden>
                                        <div class="form-group">
                                            <input type="file" name="jawaban2" id="jawaban2" accept=".png, .jpeg, .jpg" data-allowed-file-extensions='["png", "jpeg", "jpg"]' id="input-file-now" class="dropify" data-max-file-size="3000K" />
                                            <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (png, jpeg, jpg)</p>
                                        </div>
                                    </div>
    
                                    <div class="form-group" id="formtanya3" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 3</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan3" name="pertanyaan3" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab3" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori3 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" id="jawaban3" name="jawaban3" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori3 == '3')
                                            <div class="form-group" id="jawaban3" name="jawaban3">
                                                <input type="radio" name="jawaban3" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban3" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban3" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban3" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban3" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                        @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya4" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 4</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan4" name="pertanyaan4" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab4" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori4 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" id="jawaban4" name="jawaban4" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori4 == '3')
                                            <div class="form-group" id="jawaban4" name="jawaban4">
                                                <input type="radio" name="jawaban4" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban4" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban4" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban4" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban4" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                        @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya5" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 5</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan5" name="pertanyaan5" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab5" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori5 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" id="jawaban5" name="jawaban5" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori5 == '3')
                                            <div class="form-group" id="jawaban5" name="jawaban5">
                                                <input type="radio" name="jawaban5" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban5" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban5" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban5" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban5" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya6" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 6</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan6" name="pertanyaan6" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab6" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori6 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" id="jawaban6" name="jawaban6" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori6 == '3')
                                            <div class="form-group" id="jawaban6" name="jawaban6">
                                                <input type="radio" name="jawaban6" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban6" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban6" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban6" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban6" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya7" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 7</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan7" name="pertanyaan7" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab7" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori7 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" id="jawaban7" name="jawaban7" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori7 == '3')
                                            <div class="form-group" id="jawaban7" name="jawaban7">
                                                <input type="radio" name="jawaban7" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban7" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban7" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban7" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban7" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya8" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 8</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan8" name="pertanyaan8" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab8" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori8 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" name="jawaban8" id="jawaban8" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori8 == '3')
                                            <div class="form-group" id="jawaban8" name="jawaban8">
                                                <input type="radio" name="jawaban8" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban8" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban8" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban8" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban8" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya9" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 9</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan9" name="pertanyaan9" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab9" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori9 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" name="jawaban9" id="jawaban9" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori9 == '3')
                                            <div class="form-group" id="jawaban9" name="jawaban9">
                                                <input type="radio" name="jawaban9" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban9" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban9" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban9" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban9" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
    
                                    <div class="form-group" id="formtanya10" hidden>
                                        <label for="text" class="col-sm-12 control-label">Pertanyaan 10</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pertanyaan10" name="pertanyaan10" placeholder="Pertanyaan"
                                                value="" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="jawab10" hidden>
                                        @foreach ($pertanyaans as $pertanyaan)
                                        @if ($pertanyaan->kategori10 == '2')
                                            <div class="form-group">
                                                <textarea class="form-control" name="jawaban10" id="jawaban10" rows="3"></textarea>
                                            </div>
                                        @endif

                                        @if ($pertanyaan->kategori10 == '3')
                                            <div class="form-group" id="jawaban10" name="jawaban10">
                                                <input type="radio" name="jawaban10" value="Sangat Tidak Setuju" <?php if ($pertanyaan == 'STS') echo 'checked="checked"'; ?>" /> Sangat Tidak Setuju<br />
                                                <input type="radio" name="jawaban10" value="Tidak Setuju" <?php if ($pertanyaan == 'TS') echo 'checked="checked"'; ?>" /> Tidak Setuju<br />
                                                <input type="radio" name="jawaban10" value="Netral" <?php if ($pertanyaan == 'N') echo 'checked="checked"'; ?>" /> Netral<br />
                                                <input type="radio" name="jawaban10" value="Setuju" <?php if ($pertanyaan == 'S') echo 'checked="checked"'; ?>" /> Setuju<br />
                                                <input type="radio" name="jawaban10" value="Sangat Setuju" <?php if ($pertanyaan == 'SS') echo 'checked="checked"'; ?>" /> Sangat Setuju<br />
                                            </div>
                                            @endif
                                        @endforeach
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

                <!--Modal Show -->
                <div class="modal fade" id="detail-modal" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showmodal">Detail Pelaporan</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body table-responsive" id="detail_id">
                                <table class="table">
                                    <tbody>
                                        {{-- <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Kegiatan</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control-plaintext" id="detailkegiatan" value="">
                                            </div>
                                            
                                            <label for="staticEmail" class="col-sm-4 col-form-label">List Pelaporan</label> <br>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Kegiatan</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control-plaintext" id="detailkegiatan" value="">
                                            </div>
                                            <label class="col-sm-4 col-form-label">List Pelaporan</label> <br>

                                            <label for="text" class="col-sm-12 control-label">Pertanyaan 1</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban</label>
                                            <div class="col-sm-12" id="detailjawaban">
                                            </div>

                                            <label for="text" class="col-sm-12 control-label">Pertanyaan 2</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan2" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 2</label>
                                            <div class="col-sm-12" id="detailjawaban2">
                                            </div>

                                            <label for="text" class="col-sm-12 control-label">Pertanyaan 3</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan3" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Pertanyaan 3</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan3" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 3</label>
                                            <div class="col-sm-12">
                                                <input type="text" readonly class="form-control" id="detailjawaban3" value="">
                                            </div>

                                            <label for="text" class="col-sm-12 control-label">Pertanyaan 4</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan4" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 4</label>
                                            <div class="col-sm-12">
                                                <input type="text" readonly class="form-control" id="detailjawaban4" value="">
                                            </div>

                                            {{-- <label for="text" class="col-sm-12 control-label">Pertanyaan 5</label>
                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan5" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 5</label>
                                            <div class="col-sm-12" id="detailjawaban5">
                                            </div> --}}

                                            {{-- <div class="col-sm-12">
                                            <input type="text" readonly class="form-control" id="detailpertanyaan6" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 6</label>
                                            <div class="col-sm-12" id="detailjawaban6">
                                            </div>

                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan7" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 7</label>
                                            <div class="col-sm-12" id="detailjawaban7">
                                            </div>

                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan8" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 8</label>
                                            <div class="col-sm-12" id="detailjawaban8">
                                            </div>

                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan9" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 9</label>
                                            <div class="col-sm-12" id="detailjawaban9">
                                            </div>

                                            <div class="col-sm-12">
                                              <input type="text" readonly class="form-control" id="detailpertanyaan10" value="">
                                            </div>
                                            <label for="text" class="col-sm-12 control-label">Jawaban 10</label>
                                            <div class="col-sm-12" id="detailjawaban10">
                                            </div> --}}
                                        </div>
                                    </tbody>
                                </table>
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
                                <p>Kamu yakin ingin menghapus data pelaporan?</p>
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
                        url: "{{ route('lappelaksanaan.index') }}",
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

            //Tombol Edit Data
            $('body').on('click', '.edit-post', function () {
                var data_id = $(this).data('id');
                $.get('lappelaksanaan/' +data_id , function (data) {
                    $('#modal-judul').html("Buat Pelaporan");
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
                    $('#jawaban').val(data.jawaban);
                    $('#jawaban2').val(data.jawaban2);
                    $('#jawaban3').val(data.jawaban3);
                    $('#jawaban4').val(data.jawaban4);
                    $('#jawaban5').val(data.jawaban5);
                    $('#jawaban6').val(data.jawaban6);
                    $('#jawaban7').val(data.jawaban7);
                    $('#jawaban8').val(data.jawaban8);
                    $('#jawaban9').val(data.jawaban9);
                    $('#jawaban10').val(data.jawaban10);
                })
            });
            
            //Tombol Add Pertanyaan
            $('#tambah-pertanyaan2').click(function () {
                $('#formkat2').addClass("d-block");
                $('#formtanya2').addClass("d-block");
                $('#jawab2').addClass("d-block");
                $('#tmbh2').addClass("d-none");
                $('#tmbh3').addClass("d-block");
            });

            $('#tambah-pertanyaan3').click(function () {
                $('#formkat3').addClass("d-block");
                $('#formtanya3').addClass("d-block");
                $('#jawab3').addClass("d-block");
                $('#tambah-pertanyaan3').addClass("d-none");
                $('#tmbh4').addClass("d-block");
            });

            $('#tambah-pertanyaan4').click(function () {
                $('#formkat4').addClass("d-block");
                $('#formtanya4').addClass("d-block");
                $('#jawab4').addClass("d-block");
                $('#tambah-pertanyaan4').addClass("d-none");
                $('#tmbh5').addClass("d-block");
            });

            $('#tambah-pertanyaan5').click(function () {
                $('#formkat5').addClass("d-block");
                $('#formtanya5').addClass("d-block");
                $('#jawab5').addClass("d-block");
                $('#tambah-pertanyaan5').addClass("d-none");
                $('#tmbh6').addClass("d-block");
            });

            $('#tambah-pertanyaan6').click(function () {
                $('#formkat6').addClass("d-block");
                $('#formtanya6').addClass("d-block");
                $('#jawab6').addClass("d-block");
                $('#tambah-pertanyaan6').addClass("d-none");
                $('#tmbh7').addClass("d-block");
            });

            $('#tambah-pertanyaan7').click(function () {
                $('#formkat7').addClass("d-block");
                $('#formtanya7').addClass("d-block");
                $('#jawab7').addClass("d-block");
                $('#tambah-pertanyaan7').addClass("d-none");
                $('#tmbh8').addClass("d-block");
            });

            $('#tambah-pertanyaan8').click(function () {
                $('#formkat8').addClass("d-block");
                $('#formtanya8').addClass("d-block");
                $('#jawab8').addClass("d-block");
                $('#tambah-pertanyaan8').addClass("d-none");
                $('#tmbh9').addClass("d-block");
            });

            $('#tambah-pertanyaan9').click(function () {
                $('#formkat9').addClass("d-block");
                $('#formtanya9').addClass("d-block");
                $('#jawab9').addClass("d-block");
                $('#tambah-pertanyaan9').addClass("d-none");
                $('#tmbh10').addClass("d-block");
            });

            $('#tambah-pertanyaan10').click(function () {
                $('#formkat10').addClass("d-block");
                $('#formtanya10').addClass("d-block");
                $('#jawab10').addClass("d-block");
                $('#tambah-pertanyaan10').addClass("d-none");
            });
            //end add pertanyaan

            //Simpan, Update dan Validasi
            if ($("#form-tambah").length > 0) {
                $("#form-tambah").validate({
                    submitHandler: function (form) {
                        var fileUpload = $("#jawaban").get(0);
                        var fileUpload2 = $("#jawaban2").get(0);
                        var files = fileUpload.file;
                        var files2 = fileUpload2.file;
                        var image = new FormData(this);

                        for (var i = 0; i < files.length; i++) {
                            image.append("File", files[i]);
                        }

                        var actionType = $('#tombol-simpan').val();
                        $('#tombol-simpan').html('Sending..');

                        $.ajax({
                            data: $('#form-tambah')
                                .serialize(), 
                            url: "{{ route('lappelaksanaan.store') }}", 
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

            //Detail Data
            $('body').on('click', '.detail-modal', function () {
                    var data_id = $(this).data('id');
                    cache: false,
                    $.get('lappelaksanaan/'+data_id, function(data) {
                        $('#showmodal').html("Detail Pelaporan");
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
                        $('#detailjawaban').html('<img src="pelaporan/files/'+ data.jawaban +'" class="img-thumbnail mx-auto d-block" />');
                        $('#detailjawaban2').html('<img src="pelaporan/files/'+ data.jawaban2 +'" class="img-thumbnail mx-auto d-block" />');
                        $('#detailjawaban3').val(data.jawaban3);
                        $('#detailjawaban4').val(data.jawaban4);
                        $('#detailjawaban5').val(data.jawaban5);
                        $('#detailjawaban6').val(data.jawaban6);
                        $('#detailjawaban7').val(data.jawaban7);
                        $('#detailjawaban8').val(data.jawaban8);
                        $('#detailjawaban9').val(data.jawaban9);
                        $('#detailjawaban10').val(data.jawaban10);
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
                    url: "lappelaksanaan/" + dataId,
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