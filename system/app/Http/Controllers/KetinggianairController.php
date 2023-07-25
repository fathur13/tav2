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
        $latestData = Sensor::orderBy('created_at', 'desc')->first();
        if ($latestData->ketinggian_air < 0) {
            $latestData->ketinggian_air = 0;
        }

        // Mengecek ketinggian air dan menentukan status dan warna background
        if ($latestData->ketinggian_air < 10) {
            $status = "Normal"; // Jika ketinggian air < 10 cm, status menjadi "Tenggelam"
            $color = "info"; // Background menjadi merah
        } else if ($latestData->ketinggian_air < 100) {
            $status = "Waspada"; // Jika ketinggian air < 50 cm, status menjadi "banjir"
            $color = "warning"; // Background menjadi kuning
        } else if ($latestData->ketinggian_air < 150) {
            $status = "Siaga"; // Jika ketinggian air < 100 cm, status menjadi "Hati-hati"
            $color = "#F75B00"; // Background menjadi kuning
        } else if ($latestData->ketinggian_air < 200) {
            $status = "Banjir"; // Jika ketinggian air < 200 cm, status menjadi "Siaga"
            $color = "danger"; // Background menjadi biru
        } else {
            $status = "Aman"; // Jika ketinggian air >= 200 cm, status menjadi "Aman"
            $color = "success"; // Background menjadi hijau
        }

        // Mengembalikan data dalam bentuk JSON
        return response()->json([
            'status' => $status,
            'color' => $color,
            'ketinggian_air' => $latestData->ketinggian_air
        ]);
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
