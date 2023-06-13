<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard extends Controller
{
    // Menampilkan Halaman Dashboard
    public function show(){
        // Buka file csv
        $csvFile = fopen(public_path('data.csv'), 'r');
        $totalAll=0;
        $totalFaktorial=0;
        $totalPangkat=0;
        $jumlahFaktorial=0; 
        $jumlahPangkat=0;
        // Menghitung total riwayat perhitungan
        while (($getdata = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if ($getdata[1] == 'faktorial') {
                $totalFaktorial += floatval($getdata[3]);
                $jumlahFaktorial++;
            }elseif ($getdata[1] == 'pangkat') {
                $totalPangkat += floatval($getdata[3]);
                $jumlahPangkat++;
            }
            $totalAll+=floatval($getdata[3]);
        }
        fclose($csvFile);
        
        return view('home', ['totalAll' => $totalAll, 'totalFaktorial' => $totalFaktorial, 'totalPangkat' => $totalPangkat, 'jumlahFaktorial' => $jumlahFaktorial, 'jumlahPangkat' => $jumlahPangkat,]);

    }
}
