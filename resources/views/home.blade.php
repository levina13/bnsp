@extends('layout')
@section('title','Dashboard')
 
@section('content')
<div class="card-deck mx-auto">
    <div class="card border-dark mb-3" style="max-width: 18rem;">
        <div class="card-header bg-transparent border-secondary">Total Perhitungan</div>
        <div class="card-body text-secondary">
            <h5 class="card-title">{{$jumlahFaktorial+$jumlahPangkat}}</h5>
            <p class="card-text">Jumlah total perhitungan yang telah dilakukan.</p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 18rem;">
        <div class="card-header bg-transparent border-secondary">Presentase Perhitungan Pangkat</div>
        <div class="card-body text-secondary">
            <h5 class="card-title">{{number_format((float)(($jumlahPangkat/($jumlahPangkat+$jumlahFaktorial))*100), 2, '.', '')}}%</h5>
            <p class="card-text">Perhitungan pangkat telah dilakukan sebanyak {{$jumlahPangkat}} kali</p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 18rem;">
        <div class="card-header bg-transparent border-secondary">Presentase Perhitungan Faktorial</div>
        <div class="card-body text-secondary">
            <h5 class="card-title">{{number_format((float)(($jumlahFaktorial/($jumlahPangkat+$jumlahFaktorial))*100), 2, '.', '')}}%</h5>
            <p class="card-text">Perhitungan Faktorial telah dilakukan sebanyak {{$jumlahFaktorial}} kali</p>
        </div>
    </div>
</div>

    <div class="row mx-auto">
        <div class="col text-center">
            <a href="{{route('tabel.faktorial')}}">
                <button class="btn btn-secondary">Riwayat Faktorial</button>
            </a>
            <a href="{{route('tabel.pangkat')}}">
                <button class="btn btn-secondary">Riwayat Pangkat</button>
            </a>
        </div>
    </div>
@endsection