<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Membership;
use Illuminate\Support\Str;

class MembershipSeeder extends Seeder
{
    public function run()
    {
        $memberships = Membership::all();

        foreach ($memberships as $membership) {
            $membership->membership_id = 'mem_' . Str::random(10); // Generate unique membership_id
            $membership->save();
        }
    }
}

