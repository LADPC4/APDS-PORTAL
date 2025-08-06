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
            // Rename columns
            $table->renameColumn('AR1_Name', 'AR1_FN');
            $table->renameColumn('AR2_Name', 'AR2_FN');
            $table->renameColumn('AR3_Name', 'AR3_FN');

            // Add new columns
            $table->string('AR1_MN')->nullable()->after('AR1_FN');
            $table->string('AR2_MN')->nullable()->after('AR2_FN');
            $table->string('AR3_MN')->nullable()->after('AR3_FN');

            $table->string('AR1_LN')->nullable()->after('AR1_MN');
            $table->string('AR2_LN')->nullable()->after('AR2_MN');
            $table->string('AR3_LN')->nullable()->after('AR3_MN');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert column names
            $table->renameColumn('AR1_FN', 'AR1_Name');
            $table->renameColumn('AR2_FN', 'AR2_Name');
            $table->renameColumn('AR3_FN', 'AR3_Name');

            // Drop newly added columns
            $table->dropColumn(['AR1_MN', 'AR2_MN', 'AR3_MN', 'AR1_LN', 'AR2_LN', 'AR3_LN']);
        });
    }
};
