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

    public function sendEmail($to, $subject, $htmlContent, $fromEmail = null, $fromName = null, $attachmentPath = null)
    {
        try {
            $fromEmail = $fromEmail ?? config('mail.from.address');
            $fromName = $fromName ?? config('mail.from.name');

            $emailData = [
                'subject' => $subject,
                'sender' => ['name' => $fromName, 'email' => $fromEmail],
                'to' => [['email' => $to]],
                'htmlContent' => $htmlContent
            ];

            // Add attachment if provided
            if ($attachmentPath && \Storage::exists($attachmentPath)) {
                $fileContent = \Storage::get($attachmentPath);
                $fileName = basename($attachmentPath);
                
                $emailData['attachment'] = [[
                    'content' => base64_encode($fileContent),
                    'name' => $fileName
                ]];
            }

            $sendSmtpEmail = new SendSmtpEmail($emailData);
            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            
            Log::info('Brevo API email sent successfully', [
                'to' => $to,
                'subject' => $subject,
                'messageId' => $result->getMessageId(),
                'has_attachment' => !empty($attachmentPath)
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
