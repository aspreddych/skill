<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\JobUpload;

class JobUploadCompletedMail extends Mailable
{ 
    use Queueable, SerializesModels;

    public function __construct(public JobUpload $upload) {}

    public function build()
    {
        return $this->subject('Job Upload Completed')
                    ->view('emails.job_upload_completed');
    }
}
