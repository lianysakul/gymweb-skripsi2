<?php

namespace App\Http\Controllers;

use App\Models\Trainingsell;
use App\Models\Staff;
use App\Models\TrainingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingsellController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();
        $totalRevenue = 0;
    
        // Jika pengguna adalah admin atau operator, ambil semua data training sells
        if ($user->is_role == 1 || $user->is_role == 2) {
            $trainingsells = Trainingsell::all();
            $totalRevenue = Trainingsell::sum('total_amount');
        } 
        // Jika pengguna adalah user, ambil hanya data miliknya sendiri
        else if ($user->is_role == 0) {
            $memberId = $user->member->member_id;
            $trainingsells = TrainingSell::where('member_id', $memberId)->get();
        }

        $currentDate = now()->format('Y-m-d');
    
        return view('trainingsells.index', compact('trainingsells', 'totalRevenue', 'currentDate', 'user'));
    }

    public function create()
    {
        $staff = Staff::all();
        $training_products = TrainingProduct::all();
        return view('trainingsells.create', compact('staff', 'training_products'));    
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,member_id',
            'training_type' => 'required|string',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:on going,upcoming due,expired',
            'payment_method' => 'required|in:cash,e-wallet',
            'trainer' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $request->merge(['user_id' => Auth::id()]);

        Trainingsell::create($request->all());

        return redirect()->route('trainingsells.index')->with('success', 'Trainingsell created successfully.');
    }

    public function show($id)
    {
        $trainingsell = Trainingsell::findOrFail($id);
        return view('trainingsells.show', compact('trainingsell'));
    }

    public function edit($id)
    {
    // Ambil data training sell berdasarkan id
    $trainingsell = TrainingSell::findOrFail($id);

    // Ambil semua staff
    $staff = Staff::all();
    $training_products = TrainingProduct::all();
    return view('trainingsells.edit', compact('trainingsell', 'staff', 'training_products')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required|exists:members,member_id',
            'training_type' => 'required|string',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:on going,upcoming due,expired',
            'payment_method' => 'required|in:cash,e-wallet',
            'trainer' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $trainingsell = Trainingsell::findOrFail($id);
        $request->merge(['user_id' => Auth::id()]);

        $trainingsell->update($request->all());
        return redirect()->route('trainingsells.index')->with('success', 'Trainingsell updated successfully.');
    }

    public function destroy($id)
    {
        $trainingsell = Trainingsell::findOrFail($id);
        $trainingsell->delete();

        return redirect()->route('trainingsells.index')->with('success', 'Trainingsell deleted successfully.');
    }
}
