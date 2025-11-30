<?php

namespace App\Services;

use App\Contracts\Services\FinhubServiceContract;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class FinhubService implements FinhubServiceContract
{
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.finhub.api_key');
    }

    /**
     * @param string $symbol
     *
     * @return array
     * @throws ConnectionException
     */
    public function getQuote(string $symbol): array
    {
        try {
            $response = Http::get("https://finnhub.io/api/v1/quote", [
                'symbol' => $symbol,
                'token' => $this->apiKey,
            ]);

            $response->throw();

            return $response->json();
        } catch (RequestException) {
            return [];
        }
    }

    /**
     * @return array
     * @throws ConnectionException
     */
    public function getStockList(): array
    {
        try {
            $response = Http::get("https://finnhub.io/api/v1/stock/symbol", [
                'exchange' => 'US',
                'token' => $this->apiKey,
            ]);

            $response->throw();

            return $response->json();
        } catch (RequestException) {
            return [];
        }
    }

    /**
     * @param string $symbol
     *
     * @return array
     * @throws ConnectionException
     */
    public function getProfile(string $symbol): array
    {
        try {
            $response = Http::get("https://finnhub.io/api/v1/stock/profile2", [
                'symbol' => $symbol,
                'token' => $this->apiKey,
            ]);

            $response->throw();
            return $response->json();
        } catch (RequestException) {
            return [];
        }
    }
}
