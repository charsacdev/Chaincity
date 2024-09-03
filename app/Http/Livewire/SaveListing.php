<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\ReservationTable;

class SaveListing extends Component
{
     #property Saved Listing
     public $savedListingAll,$ongoing,$upcoming,$completed,$cancelled;


     public function mount(){
         #all savedListings
         $this->savedListingAll=SavedListingTable::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->get();
         $this->savedListingOngoing=SavedListingTable::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->where('status','pending')->get();
         $this->savedListingcancelled=SavedListingTable::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->where('status','cancelled')->get();

     }

    #delete saved listing
    public function SavedListingDelete($id){
        try{
            $SavedListingDelete=SavedListingTable::where(['id'=>$id])->delete();
            if($SavedListingDelete){
                session()->flash('success','Item have been removed from saved listing');
                return redirect('/savedlisting');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/savedlisting');
        }
    }


    public function render()
    {
        return view('livewire.save-listing');
    }
}
