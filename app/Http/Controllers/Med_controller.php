<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DateTime;

class Med_controller extends Controller
{
    public function index()
    {
        return view('Dashboard');
    }
    
    public function product()
    {
        return view('AddProduct');
    }
    
    public function show_product()
    {
        $data = Product::all();
        return view('ShowProduct', compact('data'));
    }
    
    public function create_product(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'manufacturer_name' => 'required',
            'quantity_in_stock' => 'required|integer',
            'unit_price' => 'required|integer|min:10',
            'expiry_date' => 'required',
        ]);

        $data = new Product;
        $data->product_name = $request->product_name;
        $data->manufacturer_name = $request->manufacturer_name;
        $data->quantity_in_stock = $request->quantity_in_stock;
        $data->unit_price = $request->unit_price;

        $originalDate= $request->expiry_date;
        $dateTime=  DateTime::createFromFormat('d/m/Y', $originalDate);
        $formattedDate = $dateTime->format('Y-m-d');
        $data->expiry_date = $formattedDate;

        $data->save();

        return redirect()->back()->with('success', 'Added successfully!.');
    }

    public function del_product($id)
    {
        $data = Product::find($id);
        $data->delete();

        return redirect()->back()->with('error', 'deleted successfully!.');
    }
}
