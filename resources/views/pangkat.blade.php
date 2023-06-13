@extends('layout')
@section('title','Pangkat')
 
@section('content')

    <div class="card p-4">
        <form action="{{route('hitung.pangkat')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Bilangan Basis</label>
              <input required type="number" class="form-control" name="base" id="base" placeholder="" value="{{ $base ?? '' }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bilangan Pangkat</label>
              <input required type="number" class="form-control" name="pangkat" id="pangkat" placeholder="" value="{{ $pangkat ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
            <div class="form-group">
              <label for="exampleInputEmail1">Hasil</label>
              <input disabled type="number" class="form-control" id="" placeholder="" value="{{ $hasil ?? '' }}">
            </div>
        </form>
        <a href="{{route('tabel.pangkat')}}">
            <button class="btn btn-secondary">Lihat Tabel</button>
        </a>
    </div>


@endsection