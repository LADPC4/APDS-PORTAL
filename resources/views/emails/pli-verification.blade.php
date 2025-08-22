<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLI Registration Email Verification</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2563eb; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f8fafc; padding: 30px; border-radius: 0 0 8px 8px; }
        .pli-details { background: white; padding: 20px; border-radius: 6px; margin: 20px 0; border-left: 4px solid #2563eb; }
        .button { display: inline-block; background: #16a34a; color: white; padding: 12px 30px; text-decoration: none; border-radius: 6px; font-weight: bold; margin: 20px 0; }
        .button:hover { background: #15803d; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #666; }
        .warning { background: #fef3c7; border: 1px solid #f59e0b; padding: 15px; border-radius: 6px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>PLI Registration Verification</h1>
            <p>Philippine Lending Institution Accreditation System</p>
        </div>
        
        <div class="content">
            <h2>Email Verification Required</h2>
            
            <p>Someone has initiated registration for your institution using the email address: <strong>{{ $verification->email }}</strong></p>
            
            <div class="pli-details">
                <h3>Institution Details:</h3>
                <ul>
                    <li><strong>Name:</strong> {{ $existingPli->name }}</li>
                    <li><strong>Loan Code:</strong> {{ $existingPli->loan_code }}</li>
                    <li><strong>Classification:</strong> {{ $existingPli->classification->name ?? 'Not specified' }}</li>
                    <li><strong>Status:</strong> {{ $existingPli->status }}</li>
                </ul>
            </div>
            
            <p>If you initiated this registration, please click the button below to verify your email address and continue:</p>
            
            <div style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="button">Verify Email Address</a>
            </div>
            
            <div class="warning">
                <strong>Important:</strong> This verification link will expire in 60 minutes. If you did not request this registration, please ignore this email.
            </div>
            
            <p>If you're unable to click the button above, copy and paste this link into your browser:</p>
            <p style="word-break: break-all; background: #e5e7eb; padding: 10px; border-radius: 4px; font-family: monospace;">{{ $verificationUrl }}</p>
        </div>
        
        <div class="footer">
            <p>PLI Accreditation Management System</p>
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>