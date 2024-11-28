<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProductPrice extends Model
{
    use HasFactory;

    protected $table = 'trainingproduct_prices';

    protected $fillable = [
        'trainingproduct_id',
        'facility_option',
        'price',
    ];

    public function trainingproduct()
    {
        return $this->belongsTo(TrainingProduct::class, 'trainingproduct_id');
    }
}

