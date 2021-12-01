<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoyageStatus extends Model
{
    use HasFactory;

    public const PENDING = 'VoyagePending';
    public const ONGOING = 'VoyageOngoing';
    public const SUBMITTED = 'VoyageSubmitted';
}
