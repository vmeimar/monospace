<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use App\Repositories\VoyageRepository;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
    /**
     * @var VoyageRepository
     */
    private $voyageRepository;

    public function __construct(VoyageRepository $voyageRepository)
    {
        $this->voyageRepository = $voyageRepository;
    }

    public function voyages(Request $request)
    {
        $data = $request->json()->all();

        $vessel_name = Vessel::where('id', $data['vessel_id'])->firstOrFail();

//        $code = $this->voyageRepository->createVoyageCode();
    }
}
