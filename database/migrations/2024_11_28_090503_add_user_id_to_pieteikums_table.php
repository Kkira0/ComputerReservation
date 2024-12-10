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
            // Check if the column exists before adding it
            if (!Schema::hasColumn('pieteikums', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
            }
    
            // Add the foreign key constraint, referencing 'idUsers' in the 'users' table
            if (!DB::select("SHOW KEYS FROM pieteikums WHERE Key_name = 'pieteikums_user_id_foreign'")) {
                $table->foreign('user_id')->references('idUsers')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pieteikums', function (Blueprint $table) {
            // Check if the foreign key exists before attempting to drop it
            $foreignKeyName = 'pieteikums_user_id_foreign';
    
            if (DB::select("SHOW KEYS FROM pieteikums WHERE Key_name = ?", [$foreignKeyName])) {
                $table->dropForeign($foreignKeyName);
            }
        });
    }
};
