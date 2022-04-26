@extends('layouts.main')

@section('hero')
    <!-- ======= Hero Section ======= -->

    <div class="container p-0" style="margin-top:150px">

        <div class="row">

            <div class="col-md-10 mx-auto">
                <div class="card mb-5 bg-light mt-2 mx-5 border-0 text-black"
                    style="background-color: transparent; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.295);">
                    <h1 class="text-center badge-primary rounded ">{{$detailKegiatan->namakegiatan}}</h1>

                    <img src="{{asset('files/'.$detailKegiatan->banner)}}" class="mx-auto d-block" style="max-height:350px; max-width:350px; alt=">
                    <div class="card-body">
                        <table class="table table-secondary rounded">
                            <tbody>
                                <tr>
                                    <td class="w-25 font-weight-bold">Nama Kegiatan </td>
                                    <td>{{$detailKegiatan->namakegiatan}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Lokasi Kegiatan </td>
                                    <td>{{$detailKegiatan->kota}}, {{$detailKegiatan->provinsi}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Waktu Kegiatan </td>
                                    <td>{{ \Carbon\Carbon::parse($detailKegiatan->waktu)->format('l, d M Y h:i')}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Jenis Kegiatan </td>
                                    <td>{{$detailKegiatan->jenis}}</td>
                                </tr>
                                <tr>
                                    <td class="w-25 font-weight-bold">Deskripsi Kegiatan </td>
                                    <td>{{$detailKegiatan->deskripsi}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/" class="btn btn-lg btn-outline-primary float-right ml-2">Kembali</a>
                       
                        @if (\Carbon\Carbon::parse($detailKegiatan->waktu)->lt($dateNow))
                            <a href="#" class="btn btn-lg btn-danger float-right" id="terlambat">Daftar</a>

                        @else
                            <a href="{{route('pendaftaranEvent',$detailKegiatan->id_kegiatan)}}" class="btn btn-lg btn-success float-right">Daftar</a>
                        @endif
                    </div>
    
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#terlambat').click(function (e) { 
            e.preventDefault();
            Swal.fire({
                    icon : 'error',
                    title : 'Event Sudah Berakhir',
                    html : 'Event yang kamu tuju sudah berakhir, silahkan daftarkan dirimu pada event lain yang masih aktif ya!'
                }).then(function(result){
                            window.location = "{{route('home')}}"
            })
        });
    </script>
    
    <!-- End Hero -->

    {{-- Service Section --}}


    <!-- End Services Section -->

    <!-- Pembicara Section -->

 

    {{-- end section Pembicara --}}

    {{-- section kegiatan --}}

  

    {{-- end section kegiatan --}}
@endsection
