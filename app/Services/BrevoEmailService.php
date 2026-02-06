<?php

namespace App\Services;

use Brevo\Client\Configuration;
use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class BrevoEmailService
{
    protected $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
        $this->apiInstance = new TransactionalEmailsApi(new Client(), $config);
    }

    public function sendEmail($to, $subject, $htmlContent, $fromEmail = null, $fromName = null)
    {
        try {
            $fromEmail = $fromEmail ?? config('mail.from.address');
            $fromName = $fromName ?? config('mail.from.name');

            $sendSmtpEmail = new SendSmtpEmail([
                'subject' => $subject,
                'sender' => ['name' => $fromName, 'email' => $fromEmail],
                'to' => [['email' => $to]],
                'htmlContent' => $htmlContent
            ]);

            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            
            Log::info('Brevo API email sent successfully', [
                'to' => $to,
                'subject' => $subject,
                'messageId' => $result->getMessageId()
            ]);

            return ['success' => true, 'messageId' => $result->getMessageId()];
        } catch (\Exception $e) {
            Log::error('Brevo API email failed', [
                'to' => $to,
                'error' => $e->getMessage()
            ]);
            
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
