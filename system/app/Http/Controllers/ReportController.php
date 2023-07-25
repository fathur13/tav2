<?php

namespace App\Http\Controllers;

use App\Models\DataKondisi;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function index(){
        $datas = DataKondisi::orderBy('created_at', 'desc')->get();
        return view('report', compact('datas'));
    }

    public function export()
    {
        $datas = DataKondisi::get()->all();
        $csvData = '';

        //header
        $csvData .= "Perangkat,Lokasi, Cuaca , Timestamp\n";

        //data
        foreach ($datas as $data) {
            $csvData .=$data->sensor . ',' . $data->location. ',' . $data->status_air . ',' . $data->created_at . "\n";
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
