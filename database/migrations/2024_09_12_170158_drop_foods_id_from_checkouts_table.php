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
        Schema::table('checkouts', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['foods_id']);

            // Then drop the column
            $table->dropColumn('foods_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            // Add the column back
            $table->unsignedBigInteger('foods_id')->nullable();

            // Add the foreign key constraint back
            $table->foreign('foods_id')->references('id')->on('foods');
        });
    }
};
