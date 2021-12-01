<?php

namespace App\Repositories;

use App\Models\Voyage;

class VoyageRepository
{
    public function createVoyageCode($name, $start)
    {
        return $name.'-'.date('Y-m-d', strtotime($start));
    }
}
