<?php

namespace App\Services\Vessel;

use Illuminate\Support\Str;

class VesselImoNumberService
{
    public function createVesselImoNumber()
    {
        return Str::random(7);
    }
}
