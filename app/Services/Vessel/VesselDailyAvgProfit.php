<?php

namespace App\Services\Vessel;

use App\Models\Vessel;
use Illuminate\Support\Facades\DB;

class VesselDailyAvgProfit
{
    public function calculate($vessel_id)
    {
        // SQL implementation (not working)
//        return DB::select(DB::raw("SELECT Avg(`profit`/ (SELECT DATEDIFF(ms, `start`, `end`))) FROM voyage WHERE `vessel_id`=".$vessel_id));


        // Eloquent implementation
        $vessel = Vessel::where('id', $vessel_id)->firstOrFail();

        foreach ($vessel->voyages as $voyage)
        {
            if (isset($voyage->profit))
            {
                $duration = (strtotime($voyage->end) - strtotime($voyage->start)) / (60 * 60 * 24);  // in days
                $daily_avg_profit = $voyage->profit / $duration;
                $net_profit = 0; // we should calculate day by day vessel opex for the voyage's time frame and subtract it from voyage profit
                $daily_avg_net_profit = 0; // $net_profit / voyage's duration
            }
        }
        return true;
    }
}
