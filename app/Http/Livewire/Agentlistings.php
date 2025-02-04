<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\ReservationTable;

class Agentlistings extends Component
{
     #property listing
     public $listingAll,$listed,$unlisted,$inprogress;


     public function mount(){
         #all listings
         $this->listingAll=PropertyTable::with('user')->where(['agent_id'=>auth()->user()->id])->get();
         $this->listed=PropertyTable::with('user')->where(['property_process->status'=>'approved','agent_id'=>auth()->user()->id])->get();
         $this->unlisted=PropertyTable::with('user')->where(['property_process->status'=>'completed','agent_id'=>auth()->user()->id])->get();
         $this->inprogress=PropertyTable::with('user')->where(['property_process->status'=>'pending','agent_id'=>auth()->user()->id])->get();

     }

    
    #approve listing
    public function Approvelisting($id){
        try{
            $approveListing=PropertyTable::where(['id'=>$id])->update([
                'property_process->status'=>'approved'
            ]);
            if($approveListing){
                session()->flash('success','Listing have been approved user will receive an email shortly');
                return redirect('/admin/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/listing');
        }
    }

     #decline listing
     public function DeclineListing($id){
        try{
            $declinedListing=PropertyTable::where(['id'=>$id])->update([
                'property_process->status'=>'completed'
            ]);
            if($declinedListing){
                session()->flash('success','Listing have been unlisted user will receive an email shortly');
                return redirect('/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/listing');
        }
    }


     #delete listing
     public function DeleteListing($id){
        try{
            $deleteListing=PropertyTable::where(['id'=>$id])->delete();
            $deleteSavedlisting=SavedListingTable::where(['property_id'=>$id])->delete();
            $reservationTable=ReservationTable::where(['property_id'=>$id])->delete();

            if($deleteListing){
                session()->flash('success','Listing have been deleted successfully');
                return redirect('/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/listing');
        }
    }



    public function render(){
        
        return view('livewire.agentlistings');
    }
}
