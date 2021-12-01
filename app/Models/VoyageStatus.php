<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoyageStatus extends Model
{
    use HasFactory;

    public const PENDING = 'pending';
    public const ONGOING = 'ongoing';
    public const SUBMITTED = 'submitted';
}
