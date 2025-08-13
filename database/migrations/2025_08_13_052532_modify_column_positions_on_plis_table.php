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
            // Example: Move 'NIR' column to after 'NCR_Prov'
            $table->boolean('NIR')->nullable()->after('NCR_Prov')->change();

            // Move 'NIR_Prov' to after 'NIR'
            $table->json('NIR_Prov')->nullable()->after('NIR')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
