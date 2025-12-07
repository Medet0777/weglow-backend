<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StockRequest;
use App\Models\Stock;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class StockCrudController extends CrudController
{
    public function setup(): void
    {
        $this->crud->setModel(Stock::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/stock');
        $this->crud->setEntityNameStrings('stock', 'stocks');

        // Columns для списка
        $this->crud->addColumns([
            ['name' => 'symbol', 'type' => 'text', 'label' => 'Symbol'],
            ['name' => 'name', 'type' => 'text', 'label' => 'Name'],
            ['name' => 'current_price', 'type' => 'number', 'label' => 'Current Price', 'prefix' => '$'],
            ['name' => 'prev_close_price', 'type' => 'number', 'label' => 'Prev Close', 'prefix' => '$'],
            ['name' => 'open_price', 'type' => 'number', 'label' => 'Open Price', 'prefix' => '$'],
            ['name' => 'high_price', 'type' => 'number', 'label' => 'High Price', 'prefix' => '$'],
            ['name' => 'low_price', 'type' => 'number', 'label' => 'Low Price', 'prefix' => '$'],
            ['name' => 'volume', 'type' => 'number', 'label' => 'Volume'],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(StockRequest::class);

        $this->crud->addFields([
            ['name' => 'symbol', 'type' => 'text', 'label' => 'Symbol'],
            ['name' => 'name', 'type' => 'text', 'label' => 'Name'],
            ['name' => 'current_price', 'type' => 'number', 'label' => 'Current Price', 'prefix' => '$', 'attributes' => ["step" => "0.01"]],
            ['name' => 'prev_close_price', 'type' => 'number', 'label' => 'Prev Close', 'prefix' => '$', 'attributes' => ["step" => "0.01"]],
            ['name' => 'open_price', 'type' => 'number', 'label' => 'Open Price', 'prefix' => '$', 'attributes' => ["step" => "0.01"]],
            ['name' => 'high_price', 'type' => 'number', 'label' => 'High Price', 'prefix' => '$', 'attributes' => ["step" => "0.01"]],
            ['name' => 'low_price', 'type' => 'number', 'label' => 'Low Price', 'prefix' => '$', 'attributes' => ["step" => "0.01"]],
            ['name' => 'volume', 'type' => 'number', 'label' => 'Volume'],
            ['name' => 'logo_url', 'type' => 'url', 'label' => 'Logo URL'],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation(); // Поля те же, что и для создания
    }
}
