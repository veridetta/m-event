@extends('layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="{{ asset('assets/asset/Logo_Spero.png') }}" rel="icon">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<section id="hasil-pencarian">
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-12">
                @if(isset($searchResults))
                    
                    @if ($searchResults-> isEmpty())
                    <div class="container" style="min-height: 300px">
                        <h2>Tidak terdapat data event yang kamu cari. <b>"{{ $searchterm }}"</b>.</h2>
                    </div>
                      
                    @else
                    <h2>Ditemukan sejumlah {{ $searchResults->count() }} hasil untuk pencarian <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                       {{-- <h1>{{ ucwords($type) }}</h1> --}}
    
                       <div class="container" >
                        <div class="row">
                            @foreach($modelSearchResults as $searchResult)
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-4">
                            {{-- <div class="col-lg-3 mb-2 content"> --}}
                              
                                <div class="card" style="width: 23rem;">
                                    
                                        <img src="{{asset('files/'.$searchResult->banner)}}" class="mx-auto d-block" style="width: 100%; height: auto;">
                                        <div class="card-body">
                                            <ul style="list-style: none; margin: 0; padding: 0;">
                                        {{-- <div class="caption mt-2 p-3"> --}}
                                            <div class="description" style="min-height: 190px">
                                                <h5 class="card-title">{{$searchResult->title}}</h5>
                                                <p class="card-text mb-0">
                                                    <i class="icofont-clock-time"></i> {{ \Carbon\Carbon::parse($searchResult->waktu)->format('l, d M Y h:i')}}<br>
                                                <i class="icofont-globe"></i> {{$searchResult->jenis}}<br>
                                                <i class="icofont-location-pin"></i> {{$searchResult->kota}}, {{$searchResult->provinsi}} <br>
                                                </p>
{{-- 
                                                <h6 class="ml-1 text-info"> {{ $searchResult->title }} </h6>
                                                <p class="ml-1 text-dark font-weight-bold"><i class="icofont-clock-time"></i>{{ \Carbon\Carbon::parse($searchResult->waktu)->format('l, d M Y h:i')}}</p>
                                                <h6><i class="icofont-globe"></i> {{$searchResult->jenis}}</h6>
                                                <p class="ml-1 text-dark"><i class="icofont-location-pin"></i>{{ $searchResult->kota }},{{ $searchResult->provinsi }} </p>    
                                                 --}}
                                            </div>
                                            @if (\Carbon\Carbon::parse($searchResult->waktu)->lt($dateNow))
                                            <a href="#" class="btn btn-sm btn-danger flex justify-content-end disabled">Event Berakhir </a>
                                            @endif
                                             <a href="{{ $searchResult->url }}" class="btn btn-sm btn-primary flex justify-content-end">Detail Event </a>
                                            
                                        </div>
                                       
                                   
                                </div>
                               
                                
                            </div>
                            @endforeach
                        </div>
                       </div>
                        
                                    
                            
                      
                    @endforeach
                @endif
            @endif
            </div>
        </div>
    </div>
    
</section>