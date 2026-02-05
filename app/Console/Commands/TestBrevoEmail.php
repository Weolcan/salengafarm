<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestBrevoEmail extends Command
{
    protected $signature = 'email:test-brevo {email}';
    protected $description = 'Test Brevo email configuration by sending a simple test email';

    public function handle()
    {
        $recipientEmail = $this->argument('email');
        
        $this->info('Testing Brevo email configuration...');
        $this->info('');
        
        // Display current configuration
        $this->info('Current Mail Configuration:');
        $this->line('MAIL_MAILER: ' . config('mail.default'));
        $this->line('MAIL_HOST: ' . config('mail.mailers.smtp.host'));
        $this->line('MAIL_PORT: ' . config('mail.mailers.smtp.port'));
        $this->line('MAIL_ENCRYPTION: ' . env('MAIL_ENCRYPTION'));
        $this->line('MAIL_USERNAME: ' . config('mail.mailers.smtp.username'));
        $this->line('MAIL_FROM_ADDRESS: ' . config('mail.from.address'));
        $this->line('MAIL_FROM_NAME: ' . config('mail.from.name'));
        $this->line('RESEND_KEY exists: ' . (!empty(config('services.resend.key')) ? 'YES (THIS IS A PROBLEM!)' : 'NO (Good)'));
        $this->info('');
        
        // Check for potential issues
        if (config('mail.default') !== 'smtp') {
            $this->error('WARNING: MAIL_MAILER is not set to "smtp"! Current value: ' . config('mail.default'));
        }
        
        if (!empty(config('services.resend.key'))) {
            $this->error('WARNING: RESEND_KEY is still set! This might cause Laravel to use Resend instead of SMTP.');
        }
        
        if (config('mail.mailers.smtp.host') !== 'smtp-relay.brevo.com') {
            $this->error('WARNING: MAIL_HOST is not set to Brevo SMTP server!');
        }
        
        $this->info('Attempting to send test email to: ' . $recipientEmail);
        
        try {
            Mail::raw('This is a test email from Salenga Farm to verify Brevo SMTP configuration.', function ($message) use ($recipientEmail) {
                $message->to($recipientEmail)
                        ->subject('Test Email - Brevo SMTP Configuration');
            });
            
            $this->info('✓ Email sent successfully!');
            $this->info('Check your inbox at: ' . $recipientEmail);
            $this->info('Also check Brevo dashboard to see if the email appears there.');
            
            return 0;
        } catch (\Exception $e) {
            $this->error('✗ Failed to send email!');
            $this->error('Error: ' . $e->getMessage());
            
            Log::error('Test email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return 1;
        }
    }
}
