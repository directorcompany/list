<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use App\Models\CurrencyRate;

class AddCurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:add {code} {rate} {date}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавить новую курс валюту';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currency = Currency::where('code', $this->argument('code'))->first();
        if (!$currency) {
            $this->error('Валюта не найден.');
            return;
        }

        CurrencyRate::create([
            'currency_id' => $currency->id,
            'rate' => $this->argument('rate'),
            'date' => $this->argument('date'),
        ]);

        $this->info('Курс валюты успешно добавлено.');
    }
}
