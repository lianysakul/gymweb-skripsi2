<?php

namespace App\Http\Controllers;

use App\Models\MySupplementProduct;
use App\Models\Supplementsell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplementsellController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();
        $totalRevenue = 0;
    
        // Jika pengguna adalah admin atau operator, ambil semua data supplement sells
        if ($user->is_role == 1 || $user->is_role == 2) {
            $supplementsells = Supplementsell::all();
            $totalRevenue = Supplementsell::sum('total_amount');
        } 
        // Jika pengguna adalah user, ambil hanya data miliknya sendiri
        else if ($user->is_role == 0) {
            $memberId = $user->member->member_id;
            $supplementsells = SupplementSell::where('member_id', $memberId)->get();
        }

        $currentDate = now()->format('Y-m-d');
    
        return view('supplementsells.index', compact('supplementsells', 'totalRevenue', 'currentDate', 'user'));
    }

    public function create()
    {
        $mysupplement_products = MySupplementProduct::all();
        return view('supplementsells.create', compact('mysupplement_products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,member_id',
            'supplement_type' => 'required|string',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|in:cash,e-wallet',
            'description' => 'nullable|string',
        ]);

        $request->merge(['user_id' => Auth::id()]);

        Supplementsell::create($request->all());

        return redirect()->route('supplementsells.index')->with('success', 'supplementsell created successfully.');
    }

    public function show($id)
    {
        $supplementsell = Supplementsell::findOrFail($id);
        return view('supplementsells.show', compact('supplementsell'));
    }

    public function edit($id)
    {
        $supplementsell = Supplementsell::findOrFail($id);
        $mysupplement_products = MySupplementProduct::all();
        return view('supplementsells.edit', compact('supplementsell', 'mysupplement_product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required|exists:members,member_id',
            'supplement_type' => 'required|string',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|in:cash,e-wallet',
            'description' => 'nullable|string',
        ]);

        $supplementsell = Supplementsell::findOrFail($id);
        $request->merge(['user_id' => Auth::id()]);

        $supplementsell->update($request->all());
        return redirect()->route('supplementsells.index')->with('success', 'supplementsell updated successfully.');
    }

    public function destroy($id)
    {
        $supplementsell = Supplementsell::findOrFail($id);
        $supplementsell->delete();

        return redirect()->route('supplementsells.index')->with('success', 'supplementsell deleted successfully.');
    }
}
