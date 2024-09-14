<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewItemAdded extends Mailable
{
    
    use Queueable, SerializesModels;

    public $item;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item, $type)
    {
        $this->item = $item;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New $this->type Added")
                    ->view('emails.newItemAdded');
    }

}
