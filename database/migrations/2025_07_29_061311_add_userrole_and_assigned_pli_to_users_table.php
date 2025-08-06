<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('userrole', ['None', 'Evaluator', 'Reviewer', 'Approver'])
                ->default('None')
                ->after('email'); // adjust 'after' as needed

            $table->json('assigned_pli')->nullable()->after('userrole'); // stores multiple values as JSON
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('userrole');
            $table->dropColumn('assigned_pli');
        });
    }
};
