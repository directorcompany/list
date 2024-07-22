<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Currency;
use App\Models\CurrencyRate;

class AddSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sale:add {name} {phone} {product} {currency} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new sale';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // $product = Product::find($this->argument('product_id'));
        // $currency = Currency::find($this->argument('currency_id'));

        // <!-- if (!$product || !$currency) {
        //     $this->error('Invalid product or currency.');
        //     return;
        // }

        // Purchase::create([
        //     'name' => $this->argument('name'),
        //     'phone' => $this->argument('phone'),
        //     'amount' => $this->argument('amount'),
        // ]);

        $name = $this->argument('name');
        $phone = $this->argument('phone');
        $product = $this->argument('product');
        $currency = $this->argument('currency');
        $amount = $this->argument('amount');
        $productName = Product::where('name', $product)->get()[0];
        $rublCurrency = Currency::where('code', 'RUB')->first();
        $usdCurrency = Currency::where('code', 'USD')->first();
        $currencyRate = CurrencyRate::count();
        $currencyId = Currency::where('code', $currency)->get()[0]['id'];
         // Проверяем наличие курса USD
         $usdRate = CurrencyRate::where('currency_id', $usdCurrency->id)->latest()->first();

         if($currencyRate == 0) {
             $this->error('Курс не найден. Пожалуйста, сначала добавьте цену');
             return;
         }
         if (!$usdRate) {
            $this->error('Курс доллара США не найден. Пожалуйста, сначала добавьте цену');
            return;
        }
        // // Пересчитываем цену в USD
        // $priceInUsd = $price * $usdRate->rate;

        // Сохраняем стоимость в USD
        Purchase::create([
            'name' => $name,
            'phone' => $phone,
            'product_id' => $productName->id,
            'currency_id' => $currencyId, 
            'amount' => $amount 
        ]);
        
        $this->info('Новая стоимость успешно сохранено');
    }
}
