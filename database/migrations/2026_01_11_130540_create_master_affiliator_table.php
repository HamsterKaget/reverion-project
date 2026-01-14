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
        Schema::create('master_affiliator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_referal')->unique();
            $table->integer('total_referrals')->default(0);
            $table->integer('total_transactions')->default(0);
            $table->decimal('total_revenue', 15, 2)->default(0);
            $table->decimal('total_commission', 15, 2)->default(0);
            $table->timestamps();

            $table->index('user_id');
            $table->index('kode_referal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_affiliator');
    }
};
