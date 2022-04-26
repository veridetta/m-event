@extends('adminlte::page')

@section('title', 'Ubah kata sandi')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1 class="m-0 text-dark">Ubah kata sandi</h1>
@stop

@section('content')
<div class="row">
    {{ csrf_field() }}
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">

              <form action="" method="POST" class="form-horizontal">
                <input type="hidden">

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Kata Sandi Baru</label>
                  <div class="col-sm-5">
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" id="password" required="">
                      <div class="input-group-append">
                        <a class="btn btn-default btn-flat float-right" onclick="myFunction()">
                          <i class="fa fa-fw fa-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mt-1">
                    <button type="submit" value="save" class="btn btn-primary btn-success">Simpan</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- ./card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
<!-- /.row -->

<script>

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }

    //Simpan, Update dan Validasi
    if ($("#form-tambah-edit").length > 0) {
        $("#form-tambah-edit").validate({
            submitHandler: function (form) {
                var actionType = $('#tombol-simpan').val();
                $('#tombol-simpan').html('Sending..');

                $.ajax({
                    data: $('#form-tambah-edit')
                        .serialize(), 
                    url: "{{ route('users.store') }}", 
                    type: "POST", 
                    dataType: 'json', 
                    success: function (data) {  
                        $('#tombol-simpan').html('Simpan');
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
</script>
@endsection