<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MySupplementProduct extends Model
{
    use HasFactory;

    protected $table = 'mysupplementproducts';

    protected $fillable = [
        'title', 'price', 'product_code', 'description', 'category', 'image_path'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'mysupplementproduct_id');
    }
}


