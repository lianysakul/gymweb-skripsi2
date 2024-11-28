<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();
    
        // Jika pengguna adalah admin atau operator, ambil semua anggota
        if ($user->is_role == 1 || $user->is_role == 2) {
            $members = Member::all();
        } 
        // Jika pengguna adalah user, ambil hanya data dirinya sendiri
        else if ($user->is_role == 0) {
            $members = Member::where('user_id', $user->id)->get();
        }
    
        return view('members.index', compact('members'));
    }
    

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'member_status' => 'required|string|max:50',
            'membership_plan' => 'required|string|max:50',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }

    public function updateStatus($id, Request $request)
    {
        $member = Member::findOrFail($id);
        $member->member_status_in_gym = 'active';  // Update status to active
        $member->member_in_gym_on = now(); // Update to current date and time
        $member->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }

    public function validateQRCode(Request $request)
    {
        $qrCode = $request->input('qr_code');

        // Logika validasi QR Code di sini
        $member = Member::where('qr_code', $qrCode)->first();

        if ($member) {
            return response()->json(['status' => 200, 'message' => 'QR Code valid']);
        } else {
            return response()->json(['status' => 400, 'message' => 'QR Code invalid']);
        }
    }
}
