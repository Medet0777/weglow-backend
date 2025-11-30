<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Stock;
use App\Contracts\Services\FinhubServiceContract;

class ImportStocks extends Command
{
    protected $signature = 'stocks:import';
    protected $description = 'Import popular stocks from Finnhub';
    protected FinhubServiceContract $finnhub;

    public function __construct(FinhubServiceContract $finnhub)
    {
        parent::__construct();
        $this->finnhub = $finnhub;
    }

    public function handle()
    {
        $this->info('Fetching stock list from Finnhub...');
        $stocksList = $this->finnhub->getStockList();

        if (empty($stocksList)) {
            $this->error('No stocks returned from API.');
            return;
        }

        $popularStocks = array_slice($stocksList, 0, 50);

        foreach ($popularStocks as $stockData) {
            if (!isset($stockData['symbol'])) continue;

            $profile = $this->finnhub->getProfile($stockData['symbol']);
            $logoUrl = $profile['logo'] ?? null;

            Stock::updateOrCreate(
                ['symbol' => $stockData['symbol']],
                [
                    'name' => $stockData['description'] ?? $stockData['displaySymbol'] ?? null,
                    'current_price' => null,
                    'logo_url' => $logoUrl,
                ]
            );
            $this->info("Added/Updated stock: {$stockData['symbol']} (logo: " . ($logoUrl ? 'yes' : 'no') . ")");
        }

        $this->info('Stocks import completed!');
    }
}
