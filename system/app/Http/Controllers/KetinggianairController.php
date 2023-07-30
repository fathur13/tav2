<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class KetinggianairController extends Controller
{
    public function index()
    {
        $datas = Sensor::get();
        $datass = Sensor::latest()->first();
        return view('ketinggian_air', compact('datas', 'datass'));
    }
    public function getKIDStatus()
{
    // Mengambil data terbaru dari database
    $kenaikan_air = Sensor::orderBy('created_at', 'desc')->first();

    if ($kenaikan_air) { // Perlu dilakukan pengecekan apakah data $kenaikan_air ada atau tidak
        // Mengecek ketinggian air dan menentukan status dan warna background
        if ($kenaikan_air->ketinggian_air >= 70 && $kenaikan_air->ketinggian_air <= 88) {
            $status = "Bahaya"; 
            $color = "danger"; 
        } else if ($kenaikan_air->ketinggian_air >= 50 && $kenaikan_air->ketinggian_air < 70) {
            $status = "Siaga"; 
            $color = "#F75B00"; 
        } else if ($kenaikan_air->ketinggian_air >= 20 && $kenaikan_air->ketinggian_air < 50) {
            $status = "Warning"; 
            $color = "warning"; 
        } else {
            $status = "Normal";
            $color = "info"; 
        }

        // Mengembalikan data dalam bentuk JSON
        return response()->json([
            'status' => $status,
            'color' => $color,
            'ketinggian_air' => $kenaikan_air->ketinggian_air
        ]);
    } else {
        // Jika data tidak ditemukan, kembalikan respon JSON dengan status dan warna default
        return response()->json([
            'status' => "Normal",
            'color' => "info",
            'ketinggian_air' => null
        ]);
    }
}

    public function chartMenit()
    {
        $data = Sensor::get();
        return response()->json($data);
    }
    public function chartJam()
    {
        $data = Sensor::get();
        return response()->json($data);
    }
    public function chartHari()
    {
        $data = Sensor::get();
        return response()->json($data);
    }
    public function export()
    {
        $datas = Sensor::get()->all();
        $csvData = '';

        //header
        $csvData .= "Perangkat,Lokasi,Ketinggian air, Timestamp\n";

        //data
        foreach ($datas as $data) {
            $csvData .=$data->sensor . ',' . $data->location. ',' . $data->ketinggian_air.  ',' . $data->created_at . "\n";
        }

        $filename = 'laporan_ketingiian_air.csv';

        // set header
        $header = [
            'Content-Type' => "text/csv",
            'Content-Disposition' => 'attachmen; filename=' . $filename, 
        ];

        // return respons file CSV
        return Response::make($csvData, 200, $header);
    }
}
