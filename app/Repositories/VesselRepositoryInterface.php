<?php

namespace App\Repositories;

use App\Models\Vessel;

interface VesselRepositoryInterface
{
    public function isVesselAvailable(Vessel $vessel);
}
