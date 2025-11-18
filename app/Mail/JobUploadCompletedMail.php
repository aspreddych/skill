<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobUploadCompletedMail extends Mailable
{ 
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Job Upload Completed')
                    ->markdown('emails.job_upload_completed');
    }
}
