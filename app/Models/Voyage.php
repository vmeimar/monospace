<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($voyage) {
            $voyage->status = VoyageStatus::PENDING;
        });
    }

    public function vessel()
    {
        return $this->hasOne(Vessel::class);
    }
}
