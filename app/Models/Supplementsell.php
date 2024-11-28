<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplementsell extends Model
{
    use HasFactory;

    protected $table = 'supplementsells';

    protected $fillable = [
        'member_id',
        'user_id',
        'supplement_type',
        'total_amount',
        'payment_method',
        'created_on',
        'description',
    ];

    // Relasi dengan model Member
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
