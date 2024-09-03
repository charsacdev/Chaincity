<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListingApproval extends Mailable
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
        return $this->subject('Chaincity Listing Approval')
                       ->markdown('mail.listing-approval')
                       ->with($this->useremail,$this->UserName);
    }

}
