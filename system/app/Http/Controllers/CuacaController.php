<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CuacaController extends Controller
{
    public function index()
    {
        $datas = Sensor::latest()->get();
        $datass = Sensor::latest()->first();
        return view('cuaca', compact('datas', 'datass'));
    }
    public function bacacuaca(Sensor $sensor): View
    {
        return view('sensor.bacacuaca', ['nilaisensor' => $sensor->latest()->paginate(1)]);
    }
    public function chartDetik()
    {
        $data = Sensor::get();
        return response()->json($data);
    }
    public function export()
    {
        $datas = Sensor::get()->all();
        $csvData = '';

        //header
        $csvData .= "Lokasi, Cuaca , Timestamp\n";

        //data
        foreach ($datas as $data) {
            $csvData .=$data->sensor . ',' . $data->status_air . ',' . $data->created_at . "\n";
        }

        $filename = 'laporan Cuaca.csv';

        // set header
        $header = [
            'Content-Type' => "text/csv",
            'Content-Disposition' => 'attachmen; filename=' . $filename, 
        ];

        // return respons file CSV
        return Response::make($csvData, 200, $header);
    }
}
