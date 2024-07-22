<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\CurrencyRate;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{

    public function index()
    {
        $rates = CurrencyRate::with('currency')->get();
        return view('currency_rates.index', compact('rates'));
    }

    public function create()
    {
        $currencies = Currency::all();
        return view('currency_rates.create', compact('currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'rate' => 'required|numeric',
            'date' => 'required|date',
        ]);

        CurrencyRate::create($request->all());

        return redirect()->route('currency_rates.index')
                         ->with('success', 'Курс валюты успешно добавлено.');
    }

    public function edit(CurrencyRate $currencyRate)
    {
        $currencies = Currency::all();
        return view('currency_rates.edit', compact('currencyRate', 'currencies'));
    }

    public function update(Request $request, CurrencyRate $currencyRate)
    {
        $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'rate' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $currencyRate->update($request->all());

        return redirect()->route('currency_rates.index')
                         ->with('success', 'Курс валюты успешно редактировано');
    }

    public function destroy(CurrencyRate $currencyRate)
    {
        $currencyRate->delete();

        return redirect()->route('currency_rates.index')
                         ->with('success', 'Курс валюты успешно удалена.');
    }
}
