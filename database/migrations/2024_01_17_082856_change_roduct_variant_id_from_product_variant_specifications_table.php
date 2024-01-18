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
        Schema::table('product_variant_specifications', function (Blueprint $table) {
            $table->unsignedBigInteger('product_variant_id')
                    ->references('id')
                    ->on('product_variants')
                    ->onDelete('cascade')
                    ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variant_specifications', function (Blueprint $table) {
            $table->unsignedBigInteger('product_variant_id')
                    ->references('id')
                    ->on('product_variants')
                    ->change();
        });
    }
};
