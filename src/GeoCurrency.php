<?php

namespace Exxtensio\ExchangeRateExtension;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class GeoCurrency extends Model
{
    use HasUlids;

    protected $table = 'geo_cur';

    protected $fillable = [
        'country',
        'code',
        'name',
        'rate'
    ];
}
