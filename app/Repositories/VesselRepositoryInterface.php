<?php

namespace App\Repositories;

use App\Models\Vessel;

interface VesselRepositoryInterface
{
    public function isVesselAvailable(Vessel $vessel);

    public function isVesselOpexDataValid($vessel_id, $data);

    public function createOpex($vessel_id, $data);
}
