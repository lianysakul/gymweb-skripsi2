<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProduct extends Model
{
    use HasFactory;

    protected $table = 'trainingproducts';

    protected $fillable = [
        'title',
        'price',
        'product_code',
        'facilities',
    ];

    public function prices()
    {
        return $this->hasMany(TrainingProductPrice::class, 'trainingproduct_id');
    }
}

