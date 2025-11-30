<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Stock;
use App\Services\FinhubService;

class UpdateStockPrices extends Command
{
    protected $signature = 'stocks:update';
    protected $description = 'Update stock prices from Finnhub';
    protected $finnhub;

    public function __construct(FinhubService $finnhub)
    {
        parent::__construct();
        $this->finnhub = $finnhub;
    }

    public function handle()
    {
        $stocks = Stock::all();
        foreach ($stocks as $stock) {
            $quote = $this->finnhub->getQuote($stock->symbol);
            if(isset($quote['c'])) {
                $stock->current_price = $quote['c'];
                $stock->save();
                $this->info("Updated {$stock->symbol}: {$quote['c']}");
            }
        }
    }
}


