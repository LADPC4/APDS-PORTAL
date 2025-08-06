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
            $table->string('AR1_Name')->nullable();
            $table->string('AR1_Designation')->nullable();
            $table->string('AR1_Contact')->nullable();
            $table->string('AR1_Email')->nullable();

            $table->string('AR2_Name')->nullable();
            $table->string('AR2_Designation')->nullable();
            $table->string('AR2_Contact')->nullable();
            $table->string('AR2_Email')->nullable();

            $table->string('AR3_Name')->nullable();
            $table->string('AR3_Designation')->nullable();
            $table->string('AR3_Contact')->nullable();
            $table->string('AR3_Email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'AR1_Name', 'AR1_Designation', 'AR1_Contact', 'AR1_Email',
                'AR2_Name', 'AR2_Designation', 'AR2_Contact', 'AR2_Email',
                'AR3_Name', 'AR3_Designation', 'AR3_Contact', 'AR3_Email',
            ]);
        });
    }
};
