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
        Schema::table('groups', function (Blueprint $table) {
        // add
        $table->string('long')->nullable();
        $table->string('lat')->nullable();
        $table->string('place')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // remove / down
            $table->dropColumn('long');
            $table->dropColumn('lat');
            $table->dropColumn('place');
        });
    }
};
