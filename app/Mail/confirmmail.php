<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cart;

class confirmmail extends Mailable
{
    public $cart;
    public $pdf_path;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart,$pdf_path)
    {
        $this->cart=$cart;
        $this->pdf_path=$pdf_path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.invoice')->attach($this->pdf_path);
    }
}
