<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $useremail,$UserName;

    public function __construct($useremail,$UserName)
    {
        $this->useremail=$useremail;
        $this->UserName=$UserName;
    }

    
    public function build()
    {
        return $this->subject('Chaincity Booking Completed Update')
                       ->markdown('mail.booking-completed')
                       ->with($this->useremail,$this->UserName);
    }
}
