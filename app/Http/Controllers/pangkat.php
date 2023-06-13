<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pangkat extends Controller
{
    // Menampilkan halaman untuk menghitung pangkat
    public function hitungPage(){
        return view('pangkat');
    }

    // Melakukan Perhitungan berdasarkan input dan menyimpan ke csv
    public function hitung(Request $request)
    {
        $base = $request->input('base');
        $pangkat = $request->input('pangkat');
        $hasil = pow($base,$pangkat);

        $tanggal = date('d-m-y h:i:s');
        $jenis = 'pangkat';
        $input = strval($base).'^'.strval($pangkat);
        $output= $hasil;
        $csvFile = fopen(public_path('data.csv'), 'r');
        while (($getdata = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            $data[] = $getdata;
        }
        fclose($csvFile);

        $data[] = ['tanggal' => $tanggal, 'jenis' => $jenis, 'input' => $input, 'output' => $output];

        $file_path = fopen(public_path('data.csv'), 'wb');

        foreach ($data as $data) {
            fputcsv($file_path, $data);
        }
        fclose($file_path);

        return view('pangkat', ['base' => $base,'pangkat'=>$pangkat, 'hasil' => $output]);
    }

    // Menampilkan tabel daftar riwayat perhitungan pangkat
    public function table()
    {
        $csvFile = fopen(public_path('data.csv'), 'r');
        while (($getdata = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if ($getdata[1] == 'pangkat') {
                $data[] = $getdata;
            }
        }
        fclose($csvFile);

        return view('pangkatTable', ['records' => $data]);
    }
}
