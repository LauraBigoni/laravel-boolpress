<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable
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
        $url = url('/admin/posts/' . $this->post->id);
        return $this->markdown('mails.posts.created', ['post' => $this->post, 'url' => $url]);
    }
}
