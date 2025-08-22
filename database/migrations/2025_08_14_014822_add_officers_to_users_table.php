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
            // Head Officers
            $table->string('ho1_fn')->nullable();
            $table->string('ho1_mn')->nullable();
            $table->string('ho1_ln')->nullable();
            $table->string('ho1_designation')->nullable();
            $table->string('ho1_contact')->nullable();
            $table->string('ho1_email')->nullable();

            $table->string('ho2_fn')->nullable();
            $table->string('ho2_mn')->nullable();
            $table->string('ho2_ln')->nullable();
            $table->string('ho2_designation')->nullable();
            $table->string('ho2_contact')->nullable();
            $table->string('ho2_email')->nullable();

            // Compliance Officers
            $table->string('co1_fn')->nullable();
            $table->string('co1_mn')->nullable();
            $table->string('co1_ln')->nullable();
            $table->string('co1_designation')->nullable();
            $table->string('co1_contact')->nullable();
            $table->string('co1_email')->nullable();

            $table->string('co2_fn')->nullable();
            $table->string('co2_mn')->nullable();
            $table->string('co2_ln')->nullable();
            $table->string('co2_designation')->nullable();
            $table->string('co2_contact')->nullable();
            $table->string('co2_email')->nullable();

            // Loan Officers
            $table->string('lo1_fn')->nullable();
            $table->string('lo1_mn')->nullable();
            $table->string('lo1_ln')->nullable();
            $table->string('lo1_designation')->nullable();
            $table->string('lo1_contact')->nullable();
            $table->string('lo1_email')->nullable();

            $table->string('lo2_fn')->nullable();
            $table->string('lo2_mn')->nullable();
            $table->string('lo2_ln')->nullable();
            $table->string('lo2_designation')->nullable();
            $table->string('lo2_contact')->nullable();
            $table->string('lo2_email')->nullable();
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
                'ho1_fn','ho1_mn','ho1_ln','ho1_designation','ho1_contact','ho1_email',
                'ho2_fn','ho2_mn','ho2_ln','ho2_designation','ho2_contact','ho2_email',
                // CO1 & CO2
                'co1_fn','co1_mn','co1_ln','co1_designation','co1_contact','co1_email',
                'co2_fn','co2_mn','co2_ln','co2_designation','co2_contact','co2_email',
                // LO1 & LO2
                'lo1_fn','lo1_mn','lo1_ln','lo1_designation','lo1_contact','lo1_email',
                'lo2_fn','lo2_mn','lo2_ln','lo2_designation','lo2_contact','lo2_email',
            ]);
        });
    }
};
