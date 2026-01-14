<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('download_counts', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->default('main');
            $table->bigInteger('count')->default(1300);
            $table->timestamps();
        });

        // Insert initial count
        DB::table('download_counts')->insert([
            'key' => 'main',
            'count' => 1300,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_counts');
    }
};
