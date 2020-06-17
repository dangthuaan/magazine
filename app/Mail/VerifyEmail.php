<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $id;

    protected $url;

    protected $token;

    /**
     * Create a new message instance.
     *
     * @param $id
     * @param $token
     */
    public function __construct($id, $token)
    {
        $this->token = $token;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.register.verify')
            ->with([
                'url' => route('auth.register.verify', [
                    'id' => $this->id,
                    'token' => $this->token
                ])
            ]);
    }
}
