<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'member_status',
        'membership_plan',  // Ganti `membership_type` menjadi `membership_plan`
        'join_date',
        'phone_number',
        'birth_place',
        'birth_date',
        'profile_picture',
        'address',
        'member_status_in_gym', // Ditambahkan
        'member_in_gym_on',     // Ditambahkan
    ];

    // Atur primary key jika kolomnya adalah 'member_id'
    protected $primaryKey = 'member_id';

    // Cast join_date dan birth_date sebagai tanggal
    protected $dates = [
        'join_date',
        'birth_date',
        'member_in_gym_on', // Ditambahkan
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
