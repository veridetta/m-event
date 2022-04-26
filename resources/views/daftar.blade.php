@extends('layouts.main')
     <meta name="csrf-token" content="{{ csrf_token() }}" />
@section('hero')
    <!-- ======= Daftar Section ======= -->

    <section id="daftar" style="margin-top:100px">
        <div class="col-md-8 mx-auto">
            <div class="card mb-5 bg-light mt-2 mx-5 border-0 text-black"
                style="background-color: transparent; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.295);">
                
        {{-- <div class="container bg-white rounded text-dark" style="margin-top: 10em"> --}}
            <h1 class="text-center badge-primary rounded "> Pendaftaran Kegiatan </h1>
            <div class="row d-flex justify-content-center">
                
                <div class="col-lg-4 col-md-6 col-sm-3 pt-4 pb-4">
                    <h2>Kegiatan yang diikuti</h2>
                    <div class="form-group">
                        <img src="{{asset('files/'.$kegiatan->banner)}}" style="max-width: 250px;" class="card p-2 rounded">
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kegiatan yang akan diikuti</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$kegiatan->namakegiatan}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal kegiatan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ \Carbon\Carbon::parse($kegiatan->waktu)->format('l, d M Y h:i')}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi kegiatan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$kegiatan->deskripsi}}" disabled>
                    </div>
                </div>

                <div class="col-lg-1"></div>

                <div class="col-lg-6 col-md-6 col-sm-3 pt-4 pb-4">
                    
                    <form method="POST" name="form-pendaftaran-event" id="form-pendaftaran-event" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Peserta <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name">
                            <small id="emailHelp" class="form-text text-muted">Isi sesuai nama anda</small>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label p-0">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div class="col-sm-12 p-0">
                                <select name="jk" id="jk" class="form-control required">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"required>Laki-laki</option>
                                    <option value="Perempuan"required>Perempuan</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Peserta <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email">
                            <small id="emailHelp" class="form-text text-muted">Isi sesuai email anda</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usia Peserta <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="usia" id="usia">
                            <small id="emailHelp" class="form-text text-muted">Isi usia anda</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Hp Peserta <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="nomorhp" id="nomorhp">
                            <small id="emailHelp" class="form-text text-muted">Isi sesuai nomor Hp anda</small>
                        </div>


                        
                
                        <div class="form-group">
                            <label for="name" class="col-sm-12 p-0 control-label">Provinsi <span class="text-danger">*</span></label>
                            <div class="col-sm-12 p-0">
                                <select name="provinsi" id="provinsi" class="form-control required" data-width="100%">
                                    <option>Pilih Provinsi</option>
                                    @foreach ($provinces as $Provinsi)
                                        <option value="{{ $Provinsi->id }}">{{ $Provinsi->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label p-0">Kota <span class="text-danger">*</span></label>
                            <div class="col-sm-12 p-0">
                                <select name="kota" id="kota" class="form-control required">
                                    <option value=""required>Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pendidikan Peserta <span class="text-danger">*</span></label>
                            <select class="form-control required" name="pendidikan" id="pendidikan"
                                placeholeder="Pekerjaan" onchange="show()">
                                <option value=""required>Pilih Pendidikan</option>
                                <option value="SD">SD / Sederajat</option>
                                <option value="SMP">SMP / Sederajat</option>
                                <option value="SMA">SMA / Sederajat</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4 / S1">D4 / S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan Peserta <span class="text-danger">*</span></label>
                            <select class="form-control required" name="pekerjaan" id="pekerjaan"
                                placeholeder="Pekerjaan" onchange="show()">
                                <option value=""required>Pilih Pekerjaan</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="ASN/TNI/Polri">ASN/TNI/Polri</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Freelancer">Freelancer</option>
                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                <option value="Lainnya">Lainnya</option>
                           </select>
                        </div>
                          <button type="submit" class="btn btn-success mr-3" id="daftar-event">Submit</button>
                          <a href="{{route('detailKegiatan.show',$kegiatan->id_kegiatan)}}" id="kembali-home" class="btn btn-primary">Kembali</a>
                    </form>
                          

                      
                </div>
            </div>
        </div>

    </section>

   
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    

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

    // if($("#form-pendaftaran-event").length > 0){
    //     $("#form-pendaftaran-event").validate({
    //             submitHandler: function(form){

    //                 $('#daftar-event').html('Sending..');
    //                 var actionType = $('#daftar-event').val();
    //                 $.ajax({
    //                     data: $('#form-pendaftaran-event').serialize(),
    //                     url: "{{ route('pendaftaranEvent.daftar',$kegiatan->id_kegiatan) }}", 
    //                     type: "POST", 
    //                     contentType: false,
    //                     processData: true,
    //                     success: function (data) {  
    //                         Swal.fire({ 
    //                             icon : 'success',
    //                             title: 'Pendaftaran Berhasil',
    //                             html: 'Terimakasih telah mendaftar. <br> Silahkan cek email anda untuk informasi selanjutnya.',
    //                         });
    //                     },
    //                     error: function (data) { 
    //                         Swal.fire({
    //                             toast : true,
    //                             icon : 'error',
    //                             title : 'Data gagal ditambahkan',
    //                         })
    //                     }
    //                 })
                
    //             }
    //     })
    // }

    
   
        $("#form-pendaftaran-event").on('submit',function (e) { 
            e.preventDefault();

            let name = $('#name').val();
            let jk = $('#jk').val();
            let email = $('#email').val();
            let nomorhp = $('#nomorhp').val();
            let provinsi = $('#provinsi').val();
            let usia = $('#usia').val();
            let kota = $('#kota').val();
            let pendidikan = $('#pendidikan').val();
            let pekerjaan = $('#pekerjaan').val();

            $.ajax({
                    url: "{{route('pendaftaranEvent.daftar',$kegiatan->id_kegiatan) }}", 
                    data: {
                        "_token" : "{{csrf_token()}}",
                        name:name,
                        email:email,
                        nomorhp:nomorhp,
                        jk:jk,
                        provinsi:provinsi,
                        kota:kota,
                        usia:usia,
                        pendidikan:pendidikan,
                        pekerjaan:pekerjaan,
                    },
                  
                    type: "POST", 
                    success: function (data) {  
                        Swal.fire({ 
                            icon : 'success',
                            title: 'Pendaftaran Berhasil',
                            html: 'Terima kasih telah mendaftar. <br> Berikut link undangan untuk menghadiri event <br>' + '<a href="{{ $kegiatan->undangan }}">links</a>',
                        }).then(function(result){
                            window.location = "{{route('home')}}"
                        })
                    },
                    error: function (data) { 
                        Swal.fire({
                            toast : true,
                            icon : 'error',
                            title : 'Data Tidak Lengkap',
                            html: 'Silahkan lengkapi data dirimu!',
                        });
                    }
                })
            
        });

  
    
      
    </script>

<script src="{{ asset('assets/js/main.js') }}"></script>

 

@endsection
