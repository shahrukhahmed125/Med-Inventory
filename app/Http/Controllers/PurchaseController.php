<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create()
    {
        $data = Product::all();
        $purchase = Purchase::all();
        return view('purchases', compact('data','purchase'));
    }

    public function store(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'product_id' => 'required|exists:products,id',
        //     'quantity_purchased' => 'required|integer|min:1',
        // ]);
    
        // Retrieve the product
        $product = Product::findOrFail($request->product_id);
    
        // Check if there is enough stock
        if ($product->quantity_in_stock < $request->quantity_purchased) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }
    
        // Calculate total price
        $totalPrice = $product->unit_price * $request->quantity_purchased;
    
        // Create a new purchase record
        $purchase = Purchase::create([
            'product_id' => $product->product_id,
            'quantity_purchased' => $request->quantity_purchased,
            'total_price' => $totalPrice,
        ]);
        $purchase->save();
    
        // Update the product's quantity in stock
        $product->decrement('quantity_in_stock', $request->quantity_purchased);
    
        return redirect()->route('purchases.create')->with('success', 'Purchase successful.');
    }
}
