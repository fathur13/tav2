<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiPostController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $time = Carbon::now();
        $sensor = $request->sensor;
        $location = $request->location;
        $suhu = $request->value1;
        $kelembapan = $request->value2;
        $ketinggian_air = $request->value3;
        $status_air = $request->value4;

        // kenaikan air
        $kenaikan_air = 28 - $ketinggian_air;
        if ($kenaikan_air < 0) {
            $kenaikan_air = 0;
        }

        // Menentukan status berdasarkan nilai yang diterima
        if ($kenaikan_air >= 21 && $kenaikan_air <= 28) {
            $status = 'bahaya';
        } elseif ($kenaikan_air >= 14 && $kenaikan_air < 21) {
            $status = 'siaga';
        } elseif ($kenaikan_air >= 7 && $kenaikan_air < 14) {
            $status = 'warning';
        } else {
            $status = 'normal';
        }

        // Ambil data terakhir dari tabel 'sensor_data' berdasarkan sensor dan location
        $existingDataSensorData = DB::table('sensor_data')
            ->where('sensor', $sensor)
            ->where('location', $location)
            ->orderBy('created_at', 'desc')
            ->first();

        // Cek apakah ada data terakhir dan kondisi saat ini berbeda
        if (!$existingDataSensorData || $existingDataSensorData->status !== $status) {
            DB::table('sensor_data')->insert([
                'sensor' => $sensor,
                'location' => $location,
                'suhu' => $suhu,
                'kelembapan' => $kelembapan,
                'ketinggian_air' => $kenaikan_air,
                'status_air' => $status_air,
                'status' => $status,
                'time' => $time->format('H:i:s'),
                'created_at' => now(),
            ]);
        }

        // Ambil data terakhir dari tabel 'sensor' berdasarkan sensor dan location
        $existingDataSensor = DB::table('sensor')
            ->where('sensor', $sensor)
            ->where('location', $location)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$existingDataSensor) {
            // Jika tidak ada data, simpan data baru
            DB::table('sensor')->insert([
                'sensor' => $sensor,
                'location' => $location,
                'suhu' => $suhu,
                'kelembapan' => $kelembapan,
                'ketinggian_air' => $kenaikan_air,
                'status_air' => $status_air,
                'time' => $time->format('H:i:s'),
                'created_at' => now(),
            ]);
        } else {
            // Jika ada data, periksa waktu pembuatan terakhir
            $lastCreated = strtotime($existingDataSensor->created_at);
            $now = strtotime(now());
            $diffInSeconds = $now - $lastCreated;

            if ($diffInSeconds < 3600) {
                // Jika data masih kurang dari 1 jam, lakukan update fieldnya saja
                DB::table('sensor')
                    ->where('id', $existingDataSensor->id)
                    ->update([
                        'suhu' => $suhu,
                        'kelembapan' => $kelembapan,
                        'ketinggian_air' => $kenaikan_air,
                        'time' => $time->format('H:i:s'),
                        'status_air' => $status_air,
                        'updated_at' => now(),
                    ]);
            } else {
                // Jika data sudah lebih dari 1 jam, simpan data baru
                DB::table('sensor')->insert([
                    'sensor' => $sensor,
                    'location' => $location,
                    'suhu' => $suhu,
                    'kelembapan' => $kelembapan,
                    'ketinggian_air' => $kenaikan_air,
                    'status_air' => $status_air,
                    'time' => $time->format('H:i:s'),
                    'created_at' => now(),
                ]);
            }
        }

        return response()->json(['success' => true]);
    }
}
