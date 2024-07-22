<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Currency;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $currencies = Currency::all();

        return view('products', compact('products', 'currencies'));
    }
    
    public function reportIndex() 
    {
        $products = Product::all();
        $currencies = Currency::all();
    
        return view('reports.index', compact('products', 'currencies'));

    }

    public function report(Request $request) 
    {
        $query = Purchase::query();

        if ($request->has('product_id') && !empty($request->product_id)) {
            $query->where('product_id', $request->input('product_id'));
        }

            if ($request->input('date_filter') === 'today') {
                $query->whereDate('created_at', today());
            } elseif ($request->input('date_filter') === 'this_week') {
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            }

        if ($request->has('currency_id') && !empty($request->currency_id)) {
            $query->where('currency_id', $request->input('currency_id'));
        }

        $purchases = $query->orderBy('created_at', 'desc')->get();

        return view('reports.show', compact('purchases'));
    }
}
