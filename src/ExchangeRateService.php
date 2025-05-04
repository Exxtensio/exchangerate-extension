<?php

namespace Exxtensio\ExchangeRateExtension;

use Exception;
use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    private ?string $apiKey;
    private string $endpoint;

    public function __construct()
    {
        $this->apiKey = config('services.exchangerate.api_key');
        $this->endpoint = "//v6.exchangerate-api.com/v6/$this->apiKey/latest/USD";
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        try {
            $response = Http::get($this->endpoint);
            if ($response->ok()) {
                $responseJson = $response->json();
                if (isset($responseJson['conversion_rates'])) {
                    collect($responseJson['conversion_rates'])->map(function ($v, $k) {
                        GeoCurrency::where('code', $k)->update(['rate' => $v]);
                    });
                }
            }
        } catch (Exception $e) {}
    }
}
