<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Purchase::with(['product', 'currency']);

        if ($request->has('product_id')) {
            $query->where('product_id', $request->input('product_id'));
        }

        if ($request->has('date')) {
            if ($request->input('date') === 'today') {
                $query->whereDate('created_at', today());
            } elseif ($request->input('date') === 'this_week') {
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            }
        }

        if ($request->has('currency_id')) {
            $query->where('currency_id', $request->input('currency_id'));
        }

        $purchases = $query->orderBy('created_at', 'desc')->get();
        return response()->json($purchases);
    }
}
