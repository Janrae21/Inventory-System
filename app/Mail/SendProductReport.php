<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendProductReport extends Mailable
{
    use Queueable, SerializesModels;

    public $product;

    public $reporter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $reporter)
    {
        $this->product = $product;
        $this->reporter = $reporter;
    }

    public function build()
    {
        return $this->subject('Test Email')
            ->view('mailable.report-email');
    }
}
