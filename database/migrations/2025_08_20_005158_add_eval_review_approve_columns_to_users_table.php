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
            // Evaluation
            $table->date('eval_date')->nullable()->after('updated_at');
            $table->foreignId('evaluator_id')->nullable()->constrained('users')->nullOnDelete();

            // Review
            $table->date('rev_date')->nullable();
            $table->foreignId('reviewer_id')->nullable()->constrained('users')->nullOnDelete();

            // Approval
            $table->date('approved_date')->nullable();
            $table->foreignId('approver_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['eval_date', 'rev_date', 'approved_date']);
            $table->dropConstrainedForeignId('evaluator_id');
            $table->dropConstrainedForeignId('reviewer_id');
            $table->dropConstrainedForeignId('approver_id');
        });
    }
};
