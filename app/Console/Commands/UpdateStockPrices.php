<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Stock;
use App\Contracts\Services\FinhubServiceContract;
use Illuminate\Support\Facades\Log;

class UpdateStockPrices extends Command
{
    protected $signature = 'stocks:update';
    protected $description = 'Update stock prices from Finnhub';
    protected FinhubServiceContract $finnhub;

    public function __construct(FinhubServiceContract $finnhub)
    {
        parent::__construct();
        $this->finnhub = $finnhub;
    }

    public function handle(): int
    {
        $this->info('Starting stock price update...');

        $stocks = Stock::all();

        if ($stocks->isEmpty()) {
            $this->warn('No stocks found in the database.');
            return self::SUCCESS;
        }

        foreach ($stocks as $stock) {
            try {
                $quote = $this->finnhub->getQuote($stock->symbol);

                if (!isset($quote['c'])) {
                    $this->warn("No current price for {$stock->symbol}");
                    continue;
                }

                $stock->current_price = $quote['c'];
                $stock->open_price = $quote['o'] ?? $stock->open_price;
                $stock->high_price = $quote['h'] ?? $stock->high_price;
                $stock->low_price = $quote['l'] ?? $stock->low_price;
                $stock->prev_close_price = $quote['pc'] ?? $stock->prev_close_price;
                $stock->save();

                $this->info("Updated {$stock->symbol}: {$quote['c']}");
            } catch (\Exception $e) {
                $this->error("Failed to update {$stock->symbol}: {$e->getMessage()}");
                Log::error("UpdateStockPrices error for {$stock->symbol}", ['exception' => $e]);
            }
        }

        $this->info('Stock price update finished.');
        return self::SUCCESS;
    }
}
