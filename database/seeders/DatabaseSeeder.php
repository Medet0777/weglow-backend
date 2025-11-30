<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $stocks = [
            ['symbol' => 'AAPL', 'name' => 'Apple Inc.'],
            ['symbol' => 'MSFT', 'name' => 'Microsoft Corp.'],
            ['symbol' => 'GOOGL', 'name' => 'Alphabet Inc.'],
            ['symbol' => 'TSLA', 'name' => 'Tesla Inc.'],
            ['symbol' => 'AMZN', 'name' => 'Amazon.com Inc.'],
        ];

        foreach ($stocks as $stock) {
            Stock::create($stock);
        }
    }
}
