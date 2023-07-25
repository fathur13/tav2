<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Sensor::all();
        $datass = Sensor::latest()->first();
        return view('dashboard', compact('datas', 'datass'));
        
    }

    public function apiChart()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'suhu' => $data->suhu,
            'kelembapan_sinyal' => $data->kelembapan,
            'ketinggian_air' => $data->ketinggian_air
        ]);
    }

    public function export()
    {
        $datas = Sensor::get()->all();
        $csvData = '';

        //header
        $csvData .= "Perangkat,Lokasi,Ketinggian air,Suhu,Kelembapan, Timestamp\n";

        //data
        foreach ($datas as $data) {
            $csvData .=$data->sensor . ',' . $data->location. ',' . $data->ketinggian_air. ',' . $data->suhu. ',' . $data->kelembapan. ',' . $data->created_at . "\n";
        }

        $filename = 'laporan.csv';

        // set header
        $header = [
            'Content-Type' => "text/csv",
            'Content-Disposition' => 'attachmen; filename=' . $filename, 
        ];

        // return respons file CSV
        return Response::make($csvData, 200, $header);
    }
}
