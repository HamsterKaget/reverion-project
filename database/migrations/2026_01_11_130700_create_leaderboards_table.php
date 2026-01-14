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
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->integer('rank')->default(0);
            $table->decimal('score', 15, 2)->default(0); // Bisa berupa level, donation amount, atau score lainnya
            $table->string('type')->default('donation'); // donation, level, pvp, etc
            $table->string('avatar_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('username');
            $table->index('type');
            $table->index('rank');
            $table->index('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderboards');
    }
};
