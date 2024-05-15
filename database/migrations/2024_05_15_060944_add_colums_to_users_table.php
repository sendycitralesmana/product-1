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
            $table->string('gender')->after('avatar')->nullable();
            $table->string('religion')->after('gender')->nullable();
            $table->string('place_birth')->after('religion')->nullable();
            $table->string('date_birth')->after('place_birth')->nullable();
            $table->text('address')->after('date_birth')->nullable();
            $table->string('no_hp')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gender', 'religion', 'place_birth', 'date_birth', 'address', 'no_hp']);
        });
    }
};
