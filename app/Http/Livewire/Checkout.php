<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;

class Checkout extends Component
{
    public $allsavedlisting,$total;

    public function mount(){
        $this->allsavedlisting=SavedListingTable::with('property')->where(['user_id'=>auth()->user()->id,'status'=>'pending'])->get();
         
        $this->total=SavedListingTable::where(['user_id'=>auth()->user()->id,'status'=>'pending'])->sum('saved_description->payable');
        
    }

    #delete checkout
    public function SavedListingDelete($id){
        try{
            $SavedListingDelete=SavedListingTable::where(['id'=>$id])->delete();
            if($SavedListingDelete){
                session()->flash('success','Item have been removed from checkout list');
                return redirect('/checkout');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/checkout');
        }
    }

    
    public function render()
    {
        return view('livewire.checkout');
    }
}
