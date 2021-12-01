<?php

namespace App\Http\Controllers;

use App\Repositories\VesselRepositoryInterface;
use App\Services\Vessel\VesselDailyAvgProfit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VesselController extends Controller
{
    /**
     * @var VesselRepositoryInterface
     */
    private $vesselRepository;

    public function __construct(VesselRepositoryInterface $vesselRepository)
    {
        $this->vesselRepository = $vesselRepository;
    }

    public function create($vessel_id, Request $request)
    {
        $data = $request->json()->all();

        if ( !$this->vesselRepository->isVesselOpexDataValid($vessel_id, $data) )
        {
            return new Response([
                'message'   =>  'Given data not valid'
            ], 400);
        }
        else
        {
            $created = $this->vesselRepository->createOpex($vessel_id, $data);

            if (!$created)
            {
                return new Response([
                    'message'   =>  'Something went wrong on vessel creation'
                ], 400);
            }
            else
            {
                return new Response([
                    'message'   =>  'Vessel Opex created successfully!'
                ], 200);
            }
        }
    }

    public function report($vessel_id)
    {
        $dailyAvgProfit = app(VesselDailyAvgProfit::class)->calculate($vessel_id);
    }
}
