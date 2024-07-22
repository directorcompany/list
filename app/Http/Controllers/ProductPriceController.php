<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyRate;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function index()
    {
        $prices = ProductPrice::with(['product', 'currency'])->get();
        return view('product_prices.index', compact('prices'));
    }

    public function create()
    {
        $products = Product::all();
        $currencies = Currency::all();
        return view('product_prices.create', compact('products', 'currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($request->product_id);
        $rublCurrency = Currency::where('code', 'RUB')->first();
        $usdCurrency = Currency::where('code', 'USD')->first();
        $currencyRate = CurrencyRate::count();
        $currency = Currency::where('id', $request->currency_id)->get()[0]->code;
         // Проверяем наличие курса USD
         $usdRate = CurrencyRate::where('currency_id', $usdCurrency->id)->latest()->first();

         if($currencyRate == 0) return redirect()->back()->with('error', 'Курс не найден. Пожалуйста, сначала добавьте цену');
         if (!$usdRate) {
            // Если курс USD не найден, верните ошибку
            return redirect()->back()->with('error', 'Курс доллара США не найден. Пожалуйста, сначала добавьте цену');
        }

        if($currency == "USD") return redirect()->back()->with('error', 'Пожалуйста, введите стоимость на рублях');

        // Пересчитываем цену в USD
        $priceInUsd = $request->price * $usdRate->rate;

        // Сохраняем стоимость в USD
        ProductPrice::create([
            'product_id' => $product->id,
            'currency_id' => $usdCurrency->id, 
            'price' => $priceInUsd
        ]);
        
        return redirect()->route('product_prices.index')
                         ->with('success', 'Цена продукта успешно добавлено');
    }

    public function edit(ProductPrice $productPrice)
    {
        $products = Product::all();
        $currencies = Currency::all();
        return view('product_prices.edit', compact('productPrice', 'products', 'currencies'));
    }

    public function update(Request $request, ProductPrice $productPrice)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($request->product_id);
        $rublCurrency = Currency::where('code', 'RUB')->first();
        $usdCurrency = Currency::where('code', 'USD')->first();
        $currencyRate = CurrencyRate::count();
        $currency = Currency::where('id', $request->currency_id)->get()[0]->code;
         // Проверяем наличие курса USD
         $usdRate = CurrencyRate::where('currency_id', $usdCurrency->id)->latest()->first();
    
         if($currencyRate == 0) return redirect()->back()->with('error', 'Курс не найден. Пожалуйста, сначала добавьте цену');
         if (!$usdRate) {
            // Если курс USD не найден, верните ошибку
            return redirect()->back()->with('error', 'Курс доллара США не найден. Пожалуйста, сначала добавьте цену');
        }
    
        if($currency == "USD") return redirect()->back()->with('error', 'Пожалуйста, введите стоимость на рублях');
    
        // Пересчитываем цену в USD
        $priceInUsd = $request->price *  $usdRate->rate;
    
        // Сохраняем стоимость в USD
        $productPrice->update([
            'product_id' => $product->id,
            'currency_id' => $usdCurrency->id, 
            'price' => $priceInUsd
        ]);

        // $productPrice->update($request->all());

        return redirect()->route('product_prices.index')
                         ->with('success', 'Цена продукта успешно редактировано');
    }

    public function destroy(ProductPrice $productPrice)
    {
        $productPrice->delete();

        return redirect()->route('product_prices.index')
                         ->with('success', 'Цена продукта успешно удалена');
    }
}
