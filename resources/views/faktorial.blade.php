@extends('layout')
@section('title','Faktorial')
 
@section('content')

    <div class="card p-4">
        <form action="{{route('hitung.faktorial')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Bilangan Basis</label>
              <input required type="number" class="form-control" name="base" id="base" placeholder="" value="{{ $base ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
            <div class="form-group">
              <label for="exampleInputEmail1">Hasil</label>
              <input disabled type="number" class="form-control" id="" placeholder="" value="{{ $hasil ?? '' }}">
            </div>
        </form>
        <a href="{{route('tabel.faktorial')}}">
            <button class="btn btn-secondary">Lihat Tabel</button>
        </a>
    </div>



@endsection