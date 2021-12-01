<?php

namespace App\Repositories;

use App\Models\Vessel;
use App\Models\Voyage;
use App\Services\Voyage\VoyageCodeService;
use Illuminate\Http\Response;

class VoyageRepository implements VoyageRepositoryInterface
{
    public function createVoyage($data)
    {
        $vessel = Vessel::where('id', $data['vessel_id'])->firstOrFail();
        $vesselRepository = new VesselRepository();

        if ( $vesselRepository->isVesselAvailable($vessel) )
        {
            $voyage = Voyage::create([
                'vessel_id' =>  $vessel->id,
                'code'  =>  app(VoyageCodeService::class)->createVoyageCode($vessel->name, $data['start']),
                'start' =>  date('Y-m-d H:i:s', strtotime($data['start'])),
                'end' =>  isset($data['end']) ? date('Y-m-d H:i:s', strtotime($data['end'])) : null,
                'revenues'  => $data['revenues'] ?? null,
                'expenses'  =>  $data['expenses'] ?? null,
                'profit'    =>  $this->calculateProfitIfIsSet($data)
            ]);
        }
        else
        {
            return new Response([
                'message'   =>  'Vessel unavailable'
            ], 400);
        }

        if (!$voyage->id)
        {
            return false;
        }
        return true;
    }

    public function updateVoyage($voyage_id, $data)
    {
        $voyage = Voyage::where('id', $voyage_id)->firstOrFail();

        $updated = $voyage->update([
            'start' =>  $data['start'],
            'end' =>  $data['end'],
            'revenues' =>  $data['revenues'],
            'expenses' =>  $data['expenses'],
            'status' =>  $data['status'],
            'profit'    =>  $this->calculateProfitIfIsSet($data)
        ]);

        if (!$updated)
        {
            return false;
        }
        return true;
    }

    public function voyageDataValidate($data)
    {
        // some data validation here, security issues
        // would have implemented if more time was given
        // when creating a voyage, there are some nullable attributes (end, expenses, revenues)
        // when updating a voyage, all of these fields are needed
        if ( empty($data) )
        {
            return false;
        }

        if (isset($data['end']) and !$this->isEndingDateGreaterThanStarting($data['start'], $data['end']))
        {
            return false;
        }
        return true;
    }

    public function isEndingDateGreaterThanStarting($start, $end)
    {
        if ( strtotime($start) >= strtotime($end) )
        {
            return false;
        }
        return true;
    }

    public function calculateProfitIfIsSet($data)
    {
        if (isset($data['revenues']) and isset($data['expenses']))
        {
            return $data['revenues'] - $data['expenses'];
        }
        else
        {
            return null;
        }
    }
}
