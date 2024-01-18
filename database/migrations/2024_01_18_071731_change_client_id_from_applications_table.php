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
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('set null')
                    ->nullable()
                    ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')
                    ->references('id')
                    ->on('clients')
                    ->nullable()
                    ->change();
        });
    }
};
