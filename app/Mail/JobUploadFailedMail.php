<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobUploadFailedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $errorMessage;
    public $failuresFile;

    public function __construct($errorMessage, $failuresFile = null)
    {
        $this->errorMessage = $errorMessage;
        $this->failuresFile = $failuresFile;
    }

    public function build()
    {
        $email = $this->subject('Job Upload Failed')
                      ->markdown('emails.job_upload_failed')
                      ->with(['errorMessage' => $this->errorMessage]);

        if ($this->failuresFile && file_exists(storage_path('app/' . $this->failuresFile))) {
            $email->attach(storage_path('app/' . $this->failuresFile));
        }

        return $email;
    }
}
