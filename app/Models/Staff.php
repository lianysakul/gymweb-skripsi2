<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'name',
        'gender', // Menambahkan kolom gender
        'position',
        'hire_date',
        'phone_number',
        'status',
    ];
}
