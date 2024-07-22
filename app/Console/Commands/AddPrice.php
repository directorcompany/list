<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Currency;
use App\Models\CurrencyRate;
use App\Models\ProductPrice;

class AddPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:add {product} {currency} {price}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new price for a product';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        // $product = Product::find($this->argument('product_id'));
        // $currency = Currency::find($this->argument('currency_id'));

        // if (!$product || !$currency) {
        //     $this->error('Invalid product or currency.');
        //     return;
        // }

        // ProductPrice::updateOrCreate(
        //     ['product_id' => $product->id, 'currency_id' => $currency->id],
        //     ['price' => $this->argument('price')]
        // );

        
        $product = $this->argument('product');
        $currency = $this->argument('currency');
        $price = $this->argument('price');
        $productName = Product::where('name', $product)->get()[0];
        $rublCurrency = Currency::where('code', 'RUB')->first();
        $usdCurrency = Currency::where('code', 'USD')->first();
        $currencyRate = CurrencyRate::count();
         // Проверяем наличие курса USD
         $usdRate = CurrencyRate::where('currency_id', $usdCurrency->id)->latest()->first();

         if($currencyRate == 0) {
             $this->error('Курс не найден. Пожалуйста, сначала добавьте цену');
             return;
         }
         if (!$usdRate) {
            // Если курс USD не найден, верните ошибку
            $this->error('Курс доллара США не найден. Пожалуйста, сначала добавьте цену');
            return;
        }

        if($currency == "USD") { 
            $this->error('Пожалуйста, введите стоимость на рублях');
            return;
        }

        // Пересчитываем цену в USD
        $priceInUsd = $price * $usdRate->rate;

        // Сохраняем стоимость в USD
        ProductPrice::create([
            'product_id' => $productName->id,
            'currency_id' => $usdCurrency->id, 
            'price' => $priceInUsd
        ]);
        
        $this->info('Новая стоимость успешно сохранено');
    }
}
