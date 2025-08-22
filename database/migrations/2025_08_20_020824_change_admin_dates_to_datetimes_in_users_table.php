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
            $table->dateTime('eval_date')->nullable()->change();
            $table->dateTime('rev_date')->nullable()->change();
            $table->dateTime('approved_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('eval_date')->nullable()->change();
            $table->date('rev_date')->nullable()->change();
            $table->date('approved_date')->nullable()->change();
            //
        });
    }
};
