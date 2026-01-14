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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('order_id')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('email')->nullable();
            $table->enum('status', [
                'pending',
                'settlement',
                'capture',
                'deny',
                'cancel',
                'expire',
                'refund',
                'partial_refund',
                'chargeback'
            ])->default('pending');
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('midtrans_payment_type')->nullable();
            $table->json('midtrans_response')->nullable();
            $table->dateTime('settlement_time')->nullable();
            $table->timestamps();

            $table->index('order_id');
            $table->index('user_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
