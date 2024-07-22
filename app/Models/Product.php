<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

       /**
     * Получить цену продукта в рублях.
     *
     * @return float|int|null
     */
    public function priceInRubles()
    {
        $rubCurrencyId = Currency::where('code', 'USD')->value('id');
        if (!$rubCurrencyId) {
            return null;
        }

        $productPrice = ProductPrice::where('product_id', $this->id)
                        ->where('currency_id', $rubCurrencyId)
                        ->first();
                        
        $rate = CurrencyRate::where('currency_id', $rubCurrencyId)->orderBy('date', 'desc')->value('rate');
        
        if ($productPrice) {
            return $productPrice->price * $rate;
        }

        return null;
    }
        /**
     * Получить цену продукта в долларах.
     *
     * @return float|int|null
     */
    public function priceInDollars()
    {
        $usdCurrencyId = Currency::where('code', 'USD')->value('id');
        if (!$usdCurrencyId) {
            return null;
        }
        
        $productPrice = ProductPrice::where('product_id', $this->id)
        ->where('currency_id', $usdCurrencyId)
        ->first();
        return $productPrice ? $productPrice->price : null;
    }
}
