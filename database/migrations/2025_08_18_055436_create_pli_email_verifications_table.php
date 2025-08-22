<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pli_email_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('existing_pli_id');
            $table->string('email');
            $table->string('token');
            $table->timestamp('verified_at')->nullable();
            $table->datetime('expires_at'); // Changed from timestamp to datetime
            $table->timestamps();

            $table->foreign('existing_pli_id')->references('id')->on('existing_plis')->onDelete('cascade');
            $table->index(['token', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pli_email_verifications');
    }
};