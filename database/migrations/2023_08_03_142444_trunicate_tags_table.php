<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // truncate tags table
        Schema::table('tags', function (Blueprint $table) {
            DB::table('tags')->truncate();
            // cannot truncate a table referenced in a foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
