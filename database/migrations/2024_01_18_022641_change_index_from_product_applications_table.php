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
        Schema::table('product_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id')
                    ->references('id')
                    ->on('applications')
                    ->onDelete('cascade')
                    ->change();
            $table->unsignedBigInteger('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade')
                    ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id')
                    ->references('id')
                    ->on('applications')
                    ->change();
            $table->unsignedBigInteger('product_id')
                    ->references('id')
                    ->on('products')
                    ->change();
        });
    }
};
