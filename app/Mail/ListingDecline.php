<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListingDecline extends Mailable
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
        return $this->subject('Chaincity Listing Declined')
                       ->markdown('mail.listing-decline')
                       ->with($this->useremail,$this->UserName);
    }


}
