<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $member = $user->member;
        return view('profile.index', compact('user', 'member'));
    }

    public function edit()
    {
        $user = Auth::user();
        $phoneNumber = $user->phone_number ?? '0000000000'; // Beri nilai default jika phone_number kosong
        $member = Member::firstOrCreate(
            ['user_id' => $user->id],
            [
                'name' => $user->name,
                'member_status' => $user->member->member_status ?? 'inactive',
                'membership_plan' => $user->member->membership_plan ?? 'cutting',
                'join_date' => $user->member->join_date ?? now(),
                'phone_number' => $phoneNumber,
            ]
        );

        return view('profile.edit', compact('user', 'member'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $member = $user->member;

        $request->validate([
            'name' => 'required|string|max:255',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' => 'required|string|max:15', // Validasi untuk phone_number
            'membership_plan' => 'required|string|max:255',
        ]);

        // Update user data, keep old values if not updated
        $userData = [
            'name' => $request->input('name', $user->name),
            'birth_place' => $request->input('birth_place', $user->birth_place),
            'birth_date' => $request->input('birth_date', $user->birth_date),
            'address' => $request->input('address', $user->address),
            'phone_number' => $request->input('phone_number', $user->phone_number),
        ];

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $userData['profile_picture'] = $profilePicturePath;

            // Hanya hapus gambar lama jika ada gambar baru yang diunggah
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
        }

        // Update user
        User::where('id', $user->id)->update($userData);

        // Update or create member data, preserve the original member status
        $memberData = [
            'name' => $user->name,
            'membership_plan' => $request->input('membership_plan', $member->membership_plan),
            'join_date' => $member->join_date,
            'birth_place' => $request->input('birth_place', $member->birth_place),
            'birth_date' => $request->input('birth_date', $member->birth_date),
            'address' => $request->input('address', $member->address),
            'phone_number' => $request->input('phone_number', $member->phone_number),
            'member_status' => $member->member_status,
        ];

        // Update or create member
        Member::updateOrCreate(['user_id' => $user->id], $memberData);

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $member = $user->member;
        return view('profile.show', compact('user', 'member'));
    }
}
