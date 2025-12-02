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
            $table->string('wallet_address')->unique()->nullable()->after('email');
            $table->text('login_nonce')->nullable()->after('wallet_address');
            $table->dropUnique('users_email_unique');
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_wallet_address_unique');
            $table->dropColumn(['wallet_address', 'login_nonce']);
            $table->string('email')->unique()->change();
        });
    }
};
