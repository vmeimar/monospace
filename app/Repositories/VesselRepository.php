<?php

namespace App\Repositories;

use App\Models\Vessel;
use App\Models\VoyageStatus;

class VesselRepository implements VesselRepositoryInterface
{
    public function isVesselAvailable(Vessel $vessel)
    {
        if ( $vessel->voyage()->value('status') === VoyageStatus::ONGOING )
        {
            return false;
        }
        return true;
    }
}
