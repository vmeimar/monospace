<?php

namespace App\Services\Voyage;

use App\Models\Voyage;

class VoyageCodeService
{
    public function createVoyageCode($name, $start)
    {
        $code = $name.'-'.date('Y-m-d', strtotime($start));

        if ($this->codeAlreadyExists($code))
        {
            return null;
        }
        return $code;
    }

    private function codeAlreadyExists($code)
    {
        if ( Voyage::where('code', $code)->exists() )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
