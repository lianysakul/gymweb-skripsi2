<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_role == 0) {
                // Update member status to active and last_active_at
                $member = $user->member;
                if ($member) {
                    $member->member_status = 'active';
                    $member->last_active_at = Carbon::now();
                    $member->save();
                }

                return $next($request);
            } else {
                Auth::logout();
                return redirect(url('login'));
            }
        } else {
            Auth::logout();
            return redirect(url('login'));
        }
    }
}






