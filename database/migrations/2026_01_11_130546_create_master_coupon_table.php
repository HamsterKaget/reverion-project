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
        Schema::create('master_coupon', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->decimal('discount_amount', 10, 2);
            $table->enum('discount_type', ['percentage', 'fixed']);
            $table->dateTime('expiry_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('code');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_coupon');
    }
};
