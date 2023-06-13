@extends('layout')
@section('title','Tabel Faktorial')
 
@section('content')

    <table class="table text-white">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">tanggal</th>
                <th scope="col">jenis</th>
                <th scope="col">input</th>
                <th scope="col">output</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $key=>$item)
                <tr>
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item[0]}}</td>
                        <td>{{$item[1]}}</td>  
                        <td>{{$item[2]}}</td>  
                        <td>{{$item[3]}}</td>  

                    </tr>

                </tr>
                
            @endforeach
        </tbody>

@endsection