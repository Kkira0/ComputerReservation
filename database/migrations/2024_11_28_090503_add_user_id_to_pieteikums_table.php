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
        Schema::table('pieteikums', function (Blueprint $table) {
            // Add the user_id column
            $table->unsignedBigInteger('user_id')->nullable();

            // You can optionally add a foreign key constraint if user_id should reference the Users table
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pieteikums', function (Blueprint $table) {
            // Drop the user_id column and foreign key constraint
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
