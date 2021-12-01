<?php

namespace App\Repositories;

interface VoyageRepositoryInterface
{
    public function createVoyage($data);

    public function updateVoyage($voyage_id, $data);

    public function voyageDataValidate($data);

    public function isEndingDateGreaterThanStarting($start, $end);

    public function calculateProfitIfIsSet($data);
}
