<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opex extends Model
{
    use HasFactory;

    protected $guarded = []; // left empty to save time. normally I would use $fillable
}
