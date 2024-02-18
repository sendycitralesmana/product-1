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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->string('long')->nullable()->change();
            $table->string('weight')->nullable()->change();
            $table->string('width')->nullable()->change();
            $table->string('height')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->string('long')->nullable(false)->change();
            $table->string('weight')->nullable(false)->change();
            $table->string('width')->nullable(false)->change();
            $table->string('height')->nullable(false)->change();
        });
    }
};
