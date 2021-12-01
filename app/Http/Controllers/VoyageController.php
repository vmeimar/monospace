<?php

namespace App\Http\Controllers;

use App\Repositories\VoyageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoyageController extends Controller
{
    /**
     * @var VoyageRepositoryInterface
     */
    private $voyageRepository;

    public function __construct(VoyageRepositoryInterface $voyageRepository)
    {
        $this->voyageRepository = $voyageRepository;
    }

    public function create(Request $request)
    {
        $data = $request->json()->all();

        if ( !$this->voyageRepository->voyageDataValidate($data) )
        {
            return new Response([
                'message'   =>  'Given data not valid'
            ], 400);
        }

        $created = $this->voyageRepository->createVoyage($data);

        if (!$created)
        {
            return new Response([
                'message'   =>  'Something went wrong on voyage creation'
            ], 400);
        }
        else
        {
            return new Response([
                'message'   =>  'Created successfully'
            ], 200);
        }
    }

    public function update($voyage_id, Request $request)
    {
        $data = $request->json()->all();

        if ( !$this->voyageRepository->voyageDataValidate($data) )
        {
            return new Response([
                'message'   =>  'Given data not valid'
            ], 400);
        }

        $updated = $this->voyageRepository->updateVoyage($voyage_id, $data);

        if (!$updated)
        {
            return new Response([
                'message'   =>  'Something went wrong on voyage update'
            ], 400);
        }
        else
        {
            return new Response([
                'message'   =>  'Updated successfully'
            ], 200);
        }
    }
}
