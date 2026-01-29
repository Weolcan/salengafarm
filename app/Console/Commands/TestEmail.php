<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test {email? : The email address to send test email to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email configuration by sending a test email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email') ?: 'charleslouis.david@dssc.edu.ph';
        
        $this->info("Testing email configuration...");
        $this->info("Sending test email to: {$email}");
        
        try {
            Mail::raw(
                "This is a test email from your Plant Inventory System.\n\n" .
                "If you received this email, your email configuration is working correctly!\n\n" .
                "Sent at: " . now()->format('Y-m-d H:i:s') . "\n\n" .
                "Best regards,\nPlant Inventory System",
                function ($message) use ($email) {
                    $message->to($email)
                           ->subject('Test Email - Plant Inventory System');
                }
            );
            
            $this->info("✅ Email sent successfully!");
            Log::info('Test email sent successfully', ['recipient' => $email]);
            
        } catch (\Exception $e) {
            $this->error("❌ Failed to send email: " . $e->getMessage());
            Log::error('Test email failed', [
                'recipient' => $email,
                'error' => $e->getMessage()
            ]);
            
            // Provide troubleshooting tips
            $this->line("");
            $this->warn("Troubleshooting Tips:");
            
            if (strpos($e->getMessage(), 'Username and Password not accepted') !== false) {
                $this->line("• Your Gmail credentials are incorrect");
                $this->line("• Make sure you're using an App Password, not your regular password");
                $this->line("• Generate a new App Password: https://myaccount.google.com/apppasswords");
            } elseif (strpos($e->getMessage(), 'authentication') !== false) {
                $this->line("• Check your email configuration in .env file");
                $this->line("• Ensure 2-Factor Authentication is enabled on your Gmail account");
                $this->line("• Use an App Password instead of your regular password");
            } else {
                $this->line("• Check your internet connection");
                $this->line("• Verify SMTP settings in .env file");
                $this->line("• Check if Gmail SMTP is blocked by firewall");
            }
        }
    }
}
