<?php

namespace App\Contracts\Services;

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
}
