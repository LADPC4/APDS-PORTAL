<?php

namespace App\Mail;

use App\Models\ExistingPli;
use App\Models\PliEmailVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PliVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ExistingPli $existingPli,
        public PliEmailVerification $verification
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'PLI Registration Email Verification - ' . $this->existingPli->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pli-verification',
            with: [
                'existingPli' => $this->existingPli,
                'verification' => $this->verification,
                'verificationUrl' => route('register.existing.verify', $this->verification->token),
            ],
        );
    }
}