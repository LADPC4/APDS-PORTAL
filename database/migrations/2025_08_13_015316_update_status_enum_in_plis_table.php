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
        Schema::table('plis', function (Blueprint $table) {
            // Modify the enum to include the new values
            $table->enum('status', [
                'Active',
                'Inactive',
                'Expired',
                'Revoked'
            ])->default('Active')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plis', function (Blueprint $table) {
            // Rollback to original enum values
            $table->enum('status', [
                'Active',
                'Inactive'
            ])->default('Active')->change();
        });
    }
};
