<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function exportData(Request $request)
    {
        // Ambil data dari database berdasarkan rentang waktu yang dipilih
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $data = Sensor::whereBetween('created_at', [$fromDate, $toDate])->get(); // Ganti YourModel dengan model yang sesuai

        // Logika untuk mengekspor data sesuai kebutuhan, misalnya ke file CSV atau Excel
        // ...

        // Contoh: kembali ke halaman sebelumnya setelah ekspor data
        return back()->with('success', 'Data berhasil diekspor.');
    }
}
