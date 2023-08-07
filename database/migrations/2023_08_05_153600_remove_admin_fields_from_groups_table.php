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
            // remove admin fields
            $table->dropColumn('admin_email');
            $table->dropColumn('admin_name');
            $table->dropColumn('admin_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // add admin fields
            $table->string("admin_email");
            $table->string("admin_name");
            $table->string("admin_phone");
        });
    }
};
