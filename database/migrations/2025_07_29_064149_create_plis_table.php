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
        Schema::create('plis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('loan_code')->nullable();
            $table->string('mas_code')->nullable();
            $table->string('insurance_code')->nullable();
            $table->string('classification')->nullable();
            $table->string('in_charge')->nullable();
            $table->enum('status', [
                'Active', 'Inactive'
                ])->default('Active');

            // Region flags and province lists
            $regions = ['CAR', 'NCR', 'R01', 'R02', 'R03', 'R04A', 'R04B', 'R05', 'R06', 'R07', 'R08', 'R09', 'R10', 'R11', 'R12', 'R13'];
            foreach ($regions as $region) {
                $table->boolean($region)->nullable();
                $table->json($region . '_Prov')->nullable(); // store multiple provinces
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plis');
    }
};
