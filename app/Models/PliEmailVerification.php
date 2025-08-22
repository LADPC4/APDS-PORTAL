<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class PliEmailVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'existing_pli_id',
        'email',
        'token',
        'verified_at',
        'expires_at',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * Generate a new verification token
     */
    public static function createForPli(ExistingPli $pli): self
    {
        // Clean up any existing verifications for this PLI
        static::where('existing_pli_id', $pli->id)->delete();

        return static::create([
            'existing_pli_id' => $pli->id,
            'email' => $pli->official_email,
            'token' => Str::random(64),
            'expires_at' => now()->addMinutes(60),
        ]);
    }

    /**
     * Check if token is valid and not expired
     */
    public function isValid(): bool
    {
        return $this->verified_at === null && $this->expires_at->isFuture();
    }

    /**
     * Mark token as verified
     */
    public function markAsVerified(): void
    {
        $this->update(['verified_at' => now()]);
    }

    /**
     * Get verification by token
     */
    public static function findByToken(string $token): ?self
    {
        return static::where('token', $token)->first();
    }

    /**
     * Relationship to existing PLI
     */
    public function existingPli(): BelongsTo
    {
        return $this->belongsTo(ExistingPli::class);
    }
}