<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class KelembapanController extends Controller
{
    public function index()
    {
        $datas = Sensor::get();
        $datass = Sensor::latest()->first();
        return view('kelembapan', compact('datas', 'datass'));
    }

    public function bacakelembapan(Sensor $sensor): View
    {
        return view('sensor.bacakelembapan', ['nilaisensor' => $sensor->latest()->paginate(1)]);
    }

    public function chartDetik()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'kelembapan' => $data->kelembapan,
        ]);
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
        $csvData .= "Perangkat,Lokasi,Kelembapan, Timestamp\n";

        //data
        foreach ($datas as $data) {
            $csvData .=$data->sensor . ',' . $data->location. ',' . $data->kelembapan.  ',' . $data->created_at . "\n";
        }

        $filename = 'laporan_kelembapan.csv';

        // set header
        $header = [
            'Content-Type' => "text/csv",
            'Content-Disposition' => 'attachmen; filename=' . $filename, 
        ];

        // return respons file CSV
        return Response::make($csvData, 200, $header);
    }
}
