<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAdminBlockAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $useremail,$UserName,$emailType;

    public function __construct($useremail,$UserName,$emailType)
    {
        $this->useremail=$useremail;
        $this->UserName=$UserName;
        $this->emailType=$emailType;
    }

    
    public function build()
    {
        return $this->subject('Chaincity Account Blocking Notification')
                       ->markdown('mail.user-admin-block-account')
                       ->with($this->useremail,$this->UserName,$this->emailType);
    }
    
    
}
