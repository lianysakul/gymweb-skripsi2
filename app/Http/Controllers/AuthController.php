<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPassword;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function registration()
    {
        $data['meta_title'] = "Registration Page";
        return view('auth.registration', $data);
    }

    public function registration_post(Request $request)
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'repeat_password' => 'required_with:password|same:password|min:6',
            'is_role' => 'required'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->is_role = trim($request->is_role);
        $user->remember_token = Str::random(50);
        $user->save();

        // Tambahkan user baru ke tabel members jika is_role = 0 (User)
        if ($user->is_role == 0) {
            Member::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'member_status' => 'inactive', // Status default
                'membership_plan' => 'basic', // Rencana keanggotaan default
                'join_date' => now(),
                'phone_number' => '0000000000', // Nilai default untuk nomor telepon
            ]);
        }

        return redirect('login')->with('success', 'Register successfully');
    }

    public function login()
    {
        $data['meta_title'] = "Login Page";
        return view('auth.login', $data);
    }

    public function login_post(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            $user = Auth::user();
            if($user->is_role == '2')
            {
                return redirect()->route('dashboard'); // Operator
            }
            else if ($user->is_role == '1')
            {
                return redirect()->route('dashboard'); // Admin
            }
            else if($user->is_role == '0')
            {
                // Update member status to active
                $member = $user->member;
                if ($member) {
                    $member->member_status = 'active';
                    $member->last_active_at = Carbon::now();
                    $member->save();
                }
                return redirect()->route('dashboard'); // User
            }
            else
            {
                return redirect('login')->with('error', 'No Available Email... Please Check');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function forgot()
    {
        $data['meta_title'] = "Forgot Page";
        return view('auth.forgot', $data);
    }

    public function forgot_post(Request $request)
    {
        $count = User::where('email', '=', $request->email)->count();
        if($count > 0)
        {
            $user = User::where('email', '=', $request->email)->first();
            //$user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));   

            return redirect()->back()->with('success', 'Password has been reset.');
        }
        else
        {
            return redirect()->back()->with('error', 'Email not found in the system.');
        }
    }

    public function getReset(Request $request, $token)
    {
        $user = User::where('remember_token', '=', $token);
        if($user->count() == 0)
        {
            abort(403);
        }

        $user = $user->first();
        $data['token'] = $token;

        return view('auth.reset', $data);
    }

    public function postReset($token, ResetPassword $request)
    {
        $user = User::where('remember_token', '=', $token);
        if($user->count() == 0)
        {
            abort(403);
        }
        $user = $user->first();

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success', 'Successfully Password Reset');
    }

    public function logout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_role == 0) {
                // Update member status to inactive
                $member = $user->member;
                if ($member) {
                    $member->member_status = 'inactive';
                    $member->save();
                }
            }
        }
        Auth::logout();
        return redirect(url('/'));
    }
}    

