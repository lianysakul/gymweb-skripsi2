<?php
namespace App\Http\Controllers;

use App\Models\MySupplementProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MySupplementProductController extends Controller
{
    public function index()
    {
        $data['meta_title'] = "Supplement Products";
        $data['products'] = MySupplementProduct::all();
        return view('mysupplementproducts.index', $data);
    }

    public function create()
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('mysupplementproducts.index')->with('error', 'You do not have permission to create a product.');
        }
        
        return view('mysupplementproducts.create');
    }
    

    public function store(Request $request)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('mysupplementproducts.index')->with('error', 'You do not have permission to create a product.');
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer',
            'product_code' => 'required|string|max:255|unique:mysupplementproducts',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
        ]);
    
        $product = MySupplementProduct::create($request->only(['title', 'price', 'product_code', 'description', 'category']));
    
        return redirect()->route('mysupplementproducts.index')->with('success', 'Product created successfully.');
    }

    public function edit(MySupplementProduct $mysupplementproduct)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('mysupplementproducts.index')->with('error', 'You do not have permission to edit this product.');
        }
        return view('mysupplementproducts.edit', compact('mysupplementproduct'));
    }
    
    public function update(Request $request, MySupplementProduct $mysupplementproduct)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('mysupplementproducts.index')->with('error', 'You do not have permission to update this product.');
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer',
            'product_code' => 'required|string|max:255|unique:mysupplementproducts,product_code,' . $mysupplementproduct->id,
            'description' => 'nullable|string',
        ]);
    
        $mysupplementproduct->update($request->only(['title', 'price', 'product_code', 'description']));
    
        return redirect()->route('mysupplementproducts.index')->with('success', 'Product updated successfully.');
    }
    
    

    public function destroy(MySupplementProduct $mysupplementproduct)
    {
        if (Auth::user()->is_role != 2) {
            return redirect()->route('mysupplementproducts.index')->with('error', 'You do not have permission to delete this product.');
        }

        $mysupplementproduct->delete();
        return redirect()->route('mysupplementproducts.index')->with('success', 'Product deleted successfully.');
    }
}