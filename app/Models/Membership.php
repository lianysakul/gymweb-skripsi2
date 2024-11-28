<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_type',
        'membership_id',
        'facilities',
        'prices',
    ];

    protected $casts = [
        'facilities' => 'array',
        'prices' => 'array',
    ];
}
