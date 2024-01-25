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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('post_category_id')
                    ->references('id')
                    ->on('post_categories')
                    ->onDelete('cascade')
                    ->nullable()
                    ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('post_category_id')
                    ->references('id')
                    ->on('post_categories')
                    ->nullable()
                    ->change();
        });
    }
};
