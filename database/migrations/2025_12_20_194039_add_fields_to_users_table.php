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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
            $table->timestamp('last_login')->nullable()->after('email_verified_at');
            $table->timestamp('last_password_change')->nullable()->after('last_login');
            $table->string('kode_referal')->nullable()->after('last_password_change');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'last_login', 'last_password_change', 'kode_referal']);
        });
    }
};
