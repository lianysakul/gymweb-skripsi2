<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\Member;
use Carbon\Carbon;

class UpdateMemberStatus extends Command
{
    protected $signature = 'update:member-status';
    protected $description = 'Update member status based on subscription end date and user activity';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Dapatkan tanggal hari ini
        $today = Carbon::today();
        $now = Carbon::now();

        // Dapatkan semua langganan yang telah berakhir
        $expiredSubscriptions = Subscription::where('end_date', '<', $today)->get();

        foreach ($expiredSubscriptions as $subscription) {
            // Perbarui status anggota di tabel subscriptions
            $subscription->member_status = 'inactive';
            $subscription->save();

            // Perbarui status anggota di tabel members
            $member = $subscription->member;
            if ($member) {
                $member->member_status = 'inactive';
                $member->save();
            }
        }

        // Perbarui status anggota yang tidak aktif dalam 5 menit terakhir
        $inactiveMembers = Member::with('user')->whereHas('user', function ($query) {
            $query->where('is_role', 0);
        })->where('last_active_at', '<', $now->subMinutes(5))->orWhereNull('last_active_at')->get();

        foreach ($inactiveMembers as $member) {
            $member->member_status = 'inactive';
            $member->save();
        }

        $this->info('Member statuses updated successfully.');
    }
}

