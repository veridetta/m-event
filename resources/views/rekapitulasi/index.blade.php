@extends('adminlte::page')

@section('title', 'Rekapitulasi')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1 class="m-0 text-dark">Rekapitulasi</h1>
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
                    {{ csrf_field() }} 
                    <form>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Nama EO</label>
                          <div class="col-sm-10">
                            <select class="custom-select">
                                <option disabled value selected>Nama EO</option>
                                @foreach ($eo as $eos)
                                    <option value="{{ $eos->id }}">{{ $eos->name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Tahun</label>
                          <div class="col-sm-10">
                            <select class="custom-select">
                                <option disabled value selected>Tahun</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Rekapitulasi Pelaporan</h3>
        {{-- <div class="card-tools">
        <button type="submit" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i>
        </button> --}}
        </div>
        
        <div class="card-body table-responsive p-0">
         <table class="table table-hover text-nowrap">
        <thead>
        <tr>
        <th>ID</th>
        <th>List Kegiatan</th>
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