<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    public function rates()
    {
        return $this->hasMany(CurrencyRate::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
