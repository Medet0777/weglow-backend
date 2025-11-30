<?php

namespace App\Contracts\Services;

use Illuminate\Http\Client\ConnectionException;

interface FinhubServiceContract
{
    /**
     * @param string $symbol
     *
     * @return array
     */
    public function getQuote(string $symbol): array;

    /**
     * @return array
     */
    public function getStockList():  array;

    /**
     * @param string $symbol
     *
     * @return array
     * @throws ConnectionException
     */
    public function getProfile(string $symbol): array;
}
