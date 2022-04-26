@extends('adminlte::page')

@section('title', 'Manajemen Kategori Narasumber')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1>Manajemen Kategori Narasumber</h1>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-stripped d-table dt-responsive nowrap" style="width: 100%" id="kategori_narasumber">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori Narasumber</th>
                                    {{-- <th scope="col">Aksi</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table End -->


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

 
    //Datatable
    $(document).ready(function () {
        $('#kategori_narasumber').DataTable({
            processing: true,
            serverSide: true, 
            ajax: {
                url: "{{ route('index4') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'id_kategori',
                    name: 'id_kategori'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                // {
                //     data: 'action',
                //     name: 'action'
                // },

            ],
            order: [
                [0, 'asc']
            ]
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