<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price_idr', 15, 2);
            $table->decimal('discount_price_idr', 15, 2)->nullable();
            $table->decimal('price_usd', 10, 2);
            $table->decimal('price_discount_usd', 10, 2)->nullable();
            $table->string('item');
            $table->decimal('amount', 15, 2);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_plans');
    }
};
