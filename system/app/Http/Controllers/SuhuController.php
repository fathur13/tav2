<?php

namespace App\Http\Controllers;

use App\Models\DataKondisi;
use App\Models\Sensor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SuhuController extends Controller
{
    public function index()
    {
        $datas = Sensor::latest()->get();
        $datass = Sensor::latest()->first();
        return view('suhu', compact('datas', 'datass'));
    }

    public function bacasuhu(Sensor $sensor): View
    {
        return view('sensor.bacasuhu', ['nilaisensor' => $sensor->latest()->paginate(1)]);
    }

    public function chartDetik()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'suhu' => $data->suhu,
        ]);
    }

    public function chartJam()
    {
        $data = DataKondisi::get();
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
        $csvData .= "Lokasi,Suhu, Timestamp\n";

        //data
        foreach ($datas as $data) {
            $csvData .=$data->sensor . ',' . $data->suhu.  ',' . $data->created_at . "\n";
        }

        $filename = 'laporan_suhu.csv';

        // set header
        $header = [
            'Content-Type' => "text/csv",
            'Content-Disposition' => 'attachmen; filename=' . $filename, 
        ];

        // return respons file CSV
        return Response::make($csvData, 200, $header);
    }
}
