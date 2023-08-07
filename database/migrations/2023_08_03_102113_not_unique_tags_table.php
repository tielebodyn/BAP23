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
        // not unique
        Schema::table('tags', function (Blueprint $table) {
            $table->string('name')->unique(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // unique
        Schema::table('tags', function (Blueprint $table) {
            $table->string('name')->unique()->change();
        });
    }
};
