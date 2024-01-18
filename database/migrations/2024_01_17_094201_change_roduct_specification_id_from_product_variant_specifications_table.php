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
            $table->unsignedBigInteger('specification_id')
                    ->references('id')
                    ->on('specifications')
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
            $table->unsignedBigInteger('specification_id')
                    ->references('id')
                    ->on('specifications')
                    ->change();
        });
    }
};
