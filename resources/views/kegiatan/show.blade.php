@extends('adminlte::page')

@section('title', 'Manajemen Kegiatan')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1>Manajemen Kegiatan</h1>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')
    
    <div class="row">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="kegiatan">
                            <thead>
                                <tr>
                                    <th scope="col">Banner kegiatan</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Tanggal & Waktu Kegiatan</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Status Kegiatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Detail modal --}}
                        {{-- Modal Detail --}}
                        <div class="modal fade" id="detail-kegiatan" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="kegiatanShowModal"></h4>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <div class="container"> --}}
                                            <input type="hidden" name="id" id="detail_id">
                                            {{-- <div class="row"> --}}
                                            
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Banner</label>
                                                        <div class="col-sm-12" id="detailBanner">
                                                            
                                                        </div>
                                                    </div>
                                               
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Nama Kegiatan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailNamaKegiatan" name="detailNamaKegiatan" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Tanggal & Waktu Kegiatan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailWaktu" name="detailWaktu" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-3 control-label">Provinsi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailProvinsi" name="detailProvinsi" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Kota</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailKota" name="detailKota" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Status Kegiatan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailStatusKegiatan" name="detailStatusKegiatan" value="detailStatusKegiatan" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Jenis Pelaksanaan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailJenisPelaksanaan" name="detailJenisPelaksanaan" value="detailJenisPelaksanaan" required="" disabled>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-5 control-label">Target Peserta</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailTarget" name="detailTarget" value="detailTarget" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-5 control-label">Link Undangan</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailUndangan" name="detailUndangan" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Deskripsi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailDeskripsi" name="detailDeskripsi" value="" required="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Anggaran</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailAnggaran" name="detailAnggaran" value="" required="" disabled>
                                                        </div>
                                                    </div>      
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Rundown</label>
                                                        <div class="col-sm-12" >
                                                            <div class="form-control h-auto" id="detailRundown">

                                                            </div>
                                                        </div>
                                                    </div>      
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-12 control-label">Media Promosi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="detailMediaPromosi" name="detailMediaPromosi" disabled value="">
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                          
                                    </div>
                                  </div>
                            </div>
                        </div>


    <!-- Table End -->

     
    <!-- Akhir Modal -->

    <!-- Modal Delete -->
   
    <!-- Akhir Modal -->

    <!--Lib JS -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js" integrity="sha512-YKERjYviLQ2Pog20KZaG/TXt9OO0Xm5HE1m/OkAEBaKMcIbTH1AwHB4//r58kaUDh5b1BWwOZlnIeo0vOl1SEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js" integrity="sha512-7MUzENx3yOdqefYPoJoASx3omUka8w1QguEY+Yl2QDKwGAQIHqjfh4nGiEq5Hxx1WYR7NDGRxGaYVbLHLyhh4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<!-- JAVASCRIPT -->
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

  

    
    $(function(){
        $('#provinsi').on('change',function(){
            let id_provinsi = $('#provinsi').val();

            //console.log(id_provinsi);
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
        $('#kegiatan').DataTable({
            processing: true,
            serverSide: true, 
            ajax: {
                url: "{{ route('index6') }}",
                type: 'GET'
            },
            columns: [
                {
                    data : 'banner',render:function(data,type,row,meta) {
                        return '<img src="files/'+ data +'" style="max-height:100px; max-width:100px;" class="m-3 mx-auto d-block" />';
                    },
                    name : 'banner',
                },
                {
                    data: 'namakegiatan',
                    name: 'namakegiatan'
                },
                {
                    data: 'waktu',
                    name: 'waktu'
                   
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
                    data: 'status',
                    name: 'status'
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

     // var files = $('#banner')[0].files;

            // if(files.length > 0){
            // var banner_image = new FormData();

            // // Append data 
            // banner_image.append('file',files[0]);
            // banner_image.append('_token',CSRF_TOKEN);
            // }


    
    //Detail kegiatan
    $('body').on('click', '.detail-kegiatan', function () {
            var data_id = $(this).data('id');
            cache: false,
            $.get('kegiatan/'+data_id, function(data) { 
                $('#kegiatanShowModal').html("Detail Kegiatan");
                $('#detail-kegiatan').modal('show');
                $('#id').val(data.id_kegiatan);
                $('#detailBanner').html('<img src="files/'+ data.banner +'" class="img-thumbnail mx-auto d-block" style="max-height:200px; max-width:200px;" />');
                $('#detailNamaKegiatan').val(data.namakegiatan);
                $('#detailWaktu').val(data.waktu);
                $('#detailProvinsi').val(data.provinsi);
                $('#detailKota').val(data.kota);
                $('#detailStatusKegiatan').val(data.status);
                $('#detailJenisPelaksanaan').val(data.jenis);
                $('#detailTarget').val(data.target);
                $('#detailUndangan').val(data.undangan);
                $('#detailDeskripsi').val(data.deskripsi);
                $('#detailRundown').html('<a href="rundown/'+ data.rundown +'" > '+data.rundown+' </a>');
                $('#detailMediaPromosi').val(data.mediapromosi);
                $('#detailAnggaran').val("Rp " + data.anggaran.toLocaleString("id") + ",00");
            });
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