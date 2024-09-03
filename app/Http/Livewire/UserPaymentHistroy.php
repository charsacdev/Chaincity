<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\PaymentTable;

use Livewire\Component;

class UserPaymentHistroy extends Component
{
     #payment details
     public $paymentAll,$completed,$pending;


     public function mount(){
         #all payments
         $this->paymentAll=PaymentTable::with('user')->where('user_id',auth()->user()->id)->latest()->get();
         $this->completed=PaymentTable::with('user')->where(['transaction_status'=>'completed','user_id'=>auth()->user()->id])->latest()->get();
         $this->pending=PaymentTable::with('user')->where(['transaction_status'=>'pending','user_id'=>auth()->user()->id])->latest()->get();
         $this->cancelled=PaymentTable::with('user')->where(['transaction_status'=>'cancelled','user_id'=>auth()->user()->id])->latest()->get();
 
     }

    public function render()
    {
        return view('livewire.user-payment-histroy');
    }
}
