<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    // Dichiaro il post privato
    private $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        // Uso il costruttore per passare il post alla mail di notifica
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Array associativo con le quadre perchè ho THIS post, e non direttamente il post
        return $this->view('mails.posts.notification', ['post' => $this->post]);
    }
}
