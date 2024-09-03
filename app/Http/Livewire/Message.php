<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\ReservationTable;
use App\Models\Messaging;
use Illuminate\Http\Request;

class Message extends Component{

    #property message
    public $messageUser,$chatcode;

    
    public function mount(){
        #all message
        $this->messageUser=Messaging::with('usero','usermessage')
        ->where('user_id','=',auth()->guard('web')->user()->id)
        ->Orwhere('receiver_id','=',auth()->guard('web')->user()->id)
        ->select('user_id','receiver_id','message')
        ->distinct()
        ->get();
       
        
        #show chatcode no array
        return view('users.message')->with(['chatcode'=>[]]);
    }


      #Get Messages
      public function getMessage($code){
        #dd($code);
        $getMessage=Messaging::with('usero','user')->where('user_id',base64_decode($code))->Orwhere('receiver_id',base64_decode($code))->get();
        if($getMessage->count()>0){
            return view('users.message')->with(['chatcode'=>$getMessage]);
      }
    }


    #insert message
    public function StoreMessage(Request $request){
            
            #code
            $code = $request->receiver_id;
            

           #send message
           $sendMessage=Messaging::create([
              'user_id'=>auth()->guard('web')->user()->id,
              'receiver_id'=>$request->receiver_id,
              'message'=>$request->message
           ]);
           if($sendMessage){
              return redirect('message/'.base64_encode($code));
           }

    }


    public function render(){

        return view('livewire.message');
    }
}
