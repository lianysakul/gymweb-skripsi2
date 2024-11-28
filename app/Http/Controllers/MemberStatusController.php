<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Carbon\Carbon;

class MemberStatusController extends Controller
{
    public function index()
    {
        // Dapatkan semua anggota dengan is_role = 0 (User)
        $members = Member::with('user')->whereHas('user', function ($query) {
            $query->where('is_role', 0);
        })->get();

        // Perbarui status anggota yang tidak aktif dalam beberapa menit terakhir
        $now = Carbon::now();
        foreach ($members as $member) {
            if ($member->last_active_at && $member->last_active_at->diffInMinutes($now) > 5) {
                $member->member_status = 'inactive';
                $member->save();
            }
        }

        return view('member_status.index', compact('members'));
    }
}











