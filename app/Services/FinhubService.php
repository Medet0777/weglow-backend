<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FinhubService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('FINNHUB_API_KEY');
    }

    public function getQuote(string $symbol)
    {
        $response = Http::get("https://finnhub.io/api/v1/quote", [
            'symbol' => $symbol,
            'token' => $this->apiKey,
        ]);

        return $response->json();
    }

    public function getStockList()
    {
        $response = Http::get("https://finnhub.io/api/v1/stock/symbol", [
            'exchange' => 'US',
            'token' => $this->apiKey,
        ]);

        return $response->json();
    }
}
