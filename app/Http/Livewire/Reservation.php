<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\ReservationTable;
use App\Models\ReviewTables;

class Reservation extends Component
{
    #property reservation
    public $reservationAll,$ongoing,$upcoming,$completed,$cancelled;

    #review details
    public $rating,$message,$propertyId;

    public function mount(){
        #all reservations
        $this->reservationAll=ReservationTable::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->ongoing=ReservationTable::with('user')->where('status','ongoing')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->upcoming=ReservationTable::with('user')->where('status','upcoming')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->completed=ReservationTable::with('user')->where('status','completed')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->cancelled=ReservationTable::with('user')->where('status','cancelled')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();

    }


    #listing review
    public function Property($id){
        $this->propertyId=$id;
    }

    #add listing
    public function AddingReview(){
        $addReview=ReviewTables::create([
            'user_id'=>auth()->guard('web')->user()->id,
            'property_id'=>$this->propertyId,
            'rating'=>$this->rating,
            'rating_heading'=>'',
            'rating_message'=>$this->message,
            'approval'=>'pending',
        ]);
        if($addReview){
            session()->flash('success', "Thank you for your review");
            return redirect('/reservations');
        }
    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
