<?php

namespace App\Repositories;

use App\Models\Opex;
use App\Models\Vessel;
use App\Models\VoyageStatus;

class VesselRepository implements VesselRepositoryInterface
{
    public function isVesselAvailable(Vessel $vessel)
    {
        if ( $vessel->voyages()->value('status') === VoyageStatus::ONGOING )
        {
            return false;
        }
        return true;
    }

    public function isVesselOpexDataValid($vessel_id, $data)
    {
        if (Opex::where('vessel_id', $vessel_id)
            ->where('date', $data['date'])
            ->exists())
        {
            return false;
        }
        return true;
    }

    public function createOpex($vessel_id, $data)
    {
        if ( !Opex::create([
            'vessel_id' =>  $vessel_id,
            'date'  =>  date('Y-m-d', strtotime($data['date'])),
            'expenses'  =>  $data['expenses']
            ]))
        {
            return false;
        }
        return true;
    }
}
