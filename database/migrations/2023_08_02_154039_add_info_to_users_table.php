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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('description')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('profile_color')->nullable();
            $table->role('role')->default('user');
            $table->boolean('is_active')->default(false);
            $table->string('adress_street')->nullable();
            $table->string('adress_number')->nullable();
            $table->string('adress_postal_code')->nullable();
            $table->string('adress_city')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'firstname',
                'lastname',
                'description',
                'profile_image',
                'profile_color',
                'role',
                'is_active',
                'adress_street',
                'adress_number',
                'adress_postal_code',
                'adress_city',
                'birthdate',
                'phone',
            ]);
        });
    }
};
