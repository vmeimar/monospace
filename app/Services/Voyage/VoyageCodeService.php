<?php

namespace App\Services\Voyage;

class VoyageCodeService
{
    public function createVoyageCode($name, $start)
    {
        return $name.'-'.date('Y-m-d', strtotime($start));
    }
}
