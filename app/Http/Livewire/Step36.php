<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;
use App\Models\notifications;

class Step36 extends Component
{
    #preview values
    public $previewImage,$listingname,$listinglocation;

    #selecting preview
    public $preview;

    #mount function
    public function mount(){
        $this->preview=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
    }

    #complete preview
    public function step3_6(){
        try{
            $process=[
                'status'=>'completed',
                'step'=>'/agent/newlisting/step3-6'
            ];

            #insert into notification
            notifications::create([
                'user_id'=>auth()->user()->id,
                'receiver_id'=>'',
                'notification_type'=>'New Listing',
                'title'=>'',
                'message'=>'Hello '.auth()->user()->first_name.' Congratulation your new listing we will update you as soon as the listing is approved.',
                'read'=>''
            ]);
    
             #update for existing property
             $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_process'=>$process,
            ]);
    
            if($updateProperty){
                return redirect('/agent/newlisting/finished');
            }
        }
        catch(\Throwable $g){
            dd($g->Message());
        }
        
    }

    public function render()
    {
        return view('livewire.step36');
    }
}
