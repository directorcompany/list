<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['product', 'currency'])->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::all();
        $currencies = Currency::all();
        return view('purchases.create', compact('products', 'currencies'));
    }

    public function show($id) 
    {
        $purchase = Purchase::findOrFail($id);
        return view('purchases.show',compact('purchase'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'currency_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric',
        ]);

        Purchase::create($request->all());

        return redirect()->route('thank-you')
                         ->with('success', 'Покупка успешно добавлено');
    }

    public function edit(Purchase $purchase)
    {
        $products = Product::all();
        $currencies = Currency::all();
        return view('purchases.edit', compact('purchase', 'products', 'currencies'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'currency_id' => 'required|exists:currencies,id',
            'amount' => 'required|numeric',
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')
                         ->with('success', 'Покупка успешно редактировано');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index')
                         ->with('success', 'Покупка успешно удалено');
    }
}