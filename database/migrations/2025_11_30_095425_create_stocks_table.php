<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->unique();
            $table->string('name')->nullable();
            $table->decimal('current_price', 12)->nullable();
            $table->decimal('open_price', 12 )->nullable();
            $table->decimal('high_price', 12)->nullable();
            $table->decimal('low_price', 12)->nullable();
            $table->decimal('prev_close_price', 12)->nullable();
            $table->decimal('volume', 20)->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
