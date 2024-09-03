<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PayoutApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $useremail,$UserName,$WalletType,$WalletAddress,$Amount,$emailType;

    public function __construct($useremail,$UserName,$WalletType,$WalletAddress,$Amount,$emailType)
    {
        $this->useremail=$useremail;
        $this->UserName=$UserName;
        $this->WalletType=$WalletType;
        $this->WalletAddress=$WalletAddress;
        $this->Amount=$Amount;
        $this->emailType=$emailType;

    }

    
    public function build()
    {
        return $this->subject('Payout Notification')
                       ->markdown('mail.payout-approved-email')
                       ->with($this->useremail,$this->UserName,$this->WalletType,$this->WalletAddress,$this->Amount,$this->emailType);
    }

}
