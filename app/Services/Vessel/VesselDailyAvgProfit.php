<?php

namespace App\Services\Vessel;

use Illuminate\Support\Facades\DB;

class VesselDailyAvgProfit
{
    public function calculate($vessel_id)
    {
        return DB::select(DB::raw("SELECT Avg(`profit`/ (SELECT DATEDIFF(ms, `start`, `end`))) FROM voyage WHERE `vessel_id`=".$vessel_id));
    }
}
