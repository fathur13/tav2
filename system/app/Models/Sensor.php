<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensor';
    protected $primarykey = 'id';
    protected $filelable = ['suhu', 'kelembapan', 'ketinggian_air','status_air', 'created_at'];

    public static function getDailyData()
    {
        return self::selectRaw('DATE(created_at) as date, AVG(suhu) as suhu_avg, AVG(kelembapan) as kelembapan_avg')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }
}
