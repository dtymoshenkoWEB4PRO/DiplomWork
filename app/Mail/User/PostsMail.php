<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostsMail extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($allVotes)
    {
        //
        $this->allVotes = $allVotes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.user.posts');
    }
}
