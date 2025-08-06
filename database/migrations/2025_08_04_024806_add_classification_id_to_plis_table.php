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
            if (!Schema::hasColumn('plis', 'classification_id')) {
                $table->unsignedBigInteger('classification_id')->nullable()->after('classification');
            }
            $table->dropColumn('classification'); // Optional: Remove old column if already stored as string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plis', function (Blueprint $table) {
            //
        });
    }
};
