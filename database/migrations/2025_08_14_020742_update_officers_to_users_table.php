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
            $table->string('ho1_designation_other')->nullable()->after('ho1_designation');
            $table->string('ho2_designation_other')->nullable()->after('ho2_designation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                // HO1 & HO2
                'ho1_designation_other', 'ho2_designation_other'
            ]);
        });
    }
};
