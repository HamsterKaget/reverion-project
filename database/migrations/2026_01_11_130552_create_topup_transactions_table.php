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
        Schema::create('topup_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('username');
            $table->string('email')->nullable();
            $table->foreignId('plan_id')->constrained('master_plans')->onDelete('restrict');
            $table->foreignId('coupon_id')->nullable()->constrained('master_coupon')->onDelete('set null');
            $table->foreignId('affiliator_id')->nullable()->constrained('master_affiliator')->onDelete('set null');
            $table->decimal('price', 15, 2);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('final_price', 15, 2);
            $table->enum('currency', ['IDR', 'USD']);
            $table->decimal('bonus_amount', 15, 2)->default(0);
            $table->decimal('commission_amount', 15, 2)->default(0);
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
            $table->string('snap_token')->nullable();
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
        Schema::dropIfExists('topup_transactions');
    }
};
