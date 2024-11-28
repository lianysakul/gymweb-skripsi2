<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainingsell extends Model
{
    use HasFactory;

    protected $table = 'trainingsells';

    protected $fillable = [
        'member_id',
        'user_id',
        'training_type',
        'total_amount',
        'payment_status',
        'payment_method',
        'trainer',
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
