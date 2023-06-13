<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class faktorial extends Controller
{
    // Menampilkan Halaman Faktorial
    public function hitungPage(){
        return view('faktorial');
    }

    // Menghitunga hasil perhitungan berdasarkan input
    public function hitung(Request $request){
        $base = $request->input('base');
        $factorial=1;
        for ($x = $base; $x >= 1; $x--) {
            $factorial = $factorial * $x;
        }  

        $tanggal = date('d-m-y h:i:s');
        $jenis = 'faktorial';
        $input = strval($base).'!';
        $output= $factorial;

        $csvFile=fopen(public_path('data.csv'),'r');
        while (($getdata = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            $data[] = $getdata;
        }
        fclose($csvFile);

        $data[]= ['tanggal'=>$tanggal,'jenis'=>$jenis,'input'=>$input,'output'=>$output];

        $file_path=fopen(public_path('data.csv'), 'wb');

        foreach ($data as $data) {
            fputcsv($file_path, $data);
        }
        fclose($file_path);

        return view('faktorial',['base'=>$base, 'hasil'=>$output]);
    }

    // menampilkan tabel dan data riwayat perhitungan
    public function table(){
        $csvFile = fopen(public_path('data.csv'), 'r');
        while (($getdata = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if ($getdata[1]=='faktorial') {
                $data[] = $getdata;
            }
        }
        fclose($csvFile);

        return view('faktorialTable', ['records' => $data]);


    }
}
