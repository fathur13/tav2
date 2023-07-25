<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return view('public_api');
    }

    public function allData()
    {
        $sensor = Sensor::all();
        return response()->json($sensor);
    }

    public function show($id)
    {
        $sensor = Sensor::findOrFail($id);
        return response()->json($sensor);
    }

    public function latest(): JsonResponse
    {
        $sensor = Sensor::orderBy('created_at', 'desc')->first();
        return response()->json($sensor);
    }

    public function getByDateRange(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $sensor = Sensor::whereBetween('created_at', [$start_date, $end_date])->get();

        $data = [];
        foreach ($sensor as $s) {
            $data[] = [
                'id' => $s->id,
                'suhu' => $s->value,
                'created_at' => $s->created_at->format('Y-m-d H:i:s')
            ];
        }

        return response()->json($data);
    }
    public function getLocations()
    {
        $locations = Sensor::latest()->first(); // Ganti Location dengan model yang sesuai dengan data lokasi di database

        return response()->json($locations);
    }
}
