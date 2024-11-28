<?php

namespace App\Http\Controllers;

use App\Models\TrainingProduct;
use App\Models\TrainingProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingProductController extends Controller
{
    public function index()
    {
        $data['meta_title'] = "Training Products";
        $data['trainingproducts'] = TrainingProduct::all();
        return view('trainingproducts.index', $data);
    }

    public function create()
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('trainingproducts.index')->with('error', 'You do not have permission to create a product.');
        }
        return view('trainingproducts.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('trainingproducts.index')->with('error', 'You do not have permission to create a product.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'product_code' => 'required|string|max:255|unique:trainingproducts',
            'facilities' => 'nullable|string',
            'prices' => 'required|array',
            'prices.*.facility_option' => 'required|string',
            'prices.*.price' => 'required|integer', // Harga dalam Rupiah tanpa desimal
        ]);

        $trainingproduct = TrainingProduct::create($request->only(['title', 'product_code', 'facilities']));

        foreach ($request->prices as $price) {
            TrainingProductPrice::create([
                'trainingproduct_id' => $trainingproduct->id,
                'facility_option' => $price['facility_option'],
                'price' => $price['price'],
            ]);
        }

        return redirect()->route('trainingproducts.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, TrainingProduct $trainingproduct)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('trainingproducts.index')->with('error', 'You do not have permission to update a product.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'product_code' => 'required|string|max:255|unique:trainingproducts,product_code,' . $trainingproduct->id,
            'facilities' => 'nullable|string',
            'prices' => 'required|array',
            'prices.*.facility_option' => 'required|string',
            'prices.*.price' => 'required|integer', // Harga dalam Rupiah tanpa desimal
        ]);

        $trainingproduct->update($request->only(['title', 'product_code', 'facilities']));

        // Hapus harga lama
        $trainingproduct->prices()->delete();

        // Tambahkan harga baru
        foreach ($request->prices as $price) {
            TrainingProductPrice::create([
                'trainingproduct_id' => $trainingproduct->id,
                'facility_option' => $price['facility_option'],
                'price' => $price['price'],
            ]);
        }

        return redirect()->route('trainingproducts.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(TrainingProduct $trainingproduct)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('trainingproducts.index')->with('error', 'You do not have permission to delete a product.');
        }

        $trainingproduct->delete();

        return redirect()->route('trainingproducts.index')->with('success', 'Product deleted successfully.');
    }

    public function edit(TrainingProduct $trainingproduct)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('trainingproducts.index')->with('error', 'You do not have permission to edit a product.');
        }
        return view('trainingproducts.edit', compact('trainingproduct'));
    }
}

