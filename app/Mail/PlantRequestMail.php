<?php

namespace App\Mail;

use App\Models\PlantRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Storage;

class PlantRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $plantRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(PlantRequest $plantRequest)
    {
        $this->plantRequest = $plantRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $recipientType = ($this->plantRequest->request_type == 'user') ? 'User' : 'Client';
        
        return new Envelope(
            subject: "Plant Request #{$this->plantRequest->id} - Quotation from Salenga Farm",
            to: [new Address($this->plantRequest->email, $this->plantRequest->name)]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.plant-request',
            with: [
                'request' => $this->plantRequest,
                'recipientType' => ($this->plantRequest->request_type == 'user') ? 'User' : 'Client'
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        
        // Only attach PDF for client requests, not for user requests
        if ($this->plantRequest->request_type === 'client' && $this->plantRequest->pdf_path && Storage::exists($this->plantRequest->pdf_path)) {
            $attachments[] = Attachment::fromStorage($this->plantRequest->pdf_path)
                ->as("Plant_Request_{$this->plantRequest->id}_Quotation.pdf")
                ->withMime('application/pdf');
        }
        
        return $attachments;
    }
}
