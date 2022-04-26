@extends('adminlte::page')

@section('title', 'Eror')
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">

@section('content_header')
    <h1>Eror</h1>
@stop

@section('content')

<div class="error-page">
    <h2 class="headline text-danger"><i class="fas fa-exclamation-triangle text-danger"></i></h2>
    <div class="error-content">
    <h3> Forbidden</h3>
    <p>
        Maaf anda tidak dapat mengakses halaman ini, silakan <a href='/dashboard'>kembali ke dashboard.</a>
    </p>
    </div>
</div>
@stop
