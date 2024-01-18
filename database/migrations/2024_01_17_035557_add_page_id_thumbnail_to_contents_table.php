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
        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->after('id');
            $table->foreign('page_id')->references('id')->on('pages');
            $table->string('thumbnail')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropForeign('contents_page_id_foreign');
            $table->dropColumn('page_id');
            $table->dropColumn('thumbnail');
        });
    }
};
