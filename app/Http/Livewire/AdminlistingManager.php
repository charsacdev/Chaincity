<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\PaymentTable;
use Livewire\Component;
use App\Models\UsersTable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ListingApproval;
use App\Mail\ListingDelete;
use App\Mail\ListingDecline;


class AdminlistingManager extends Component
{
     #property listing
     public $listingAll,$listed,$unlisted,$inprogress;


     public function mount(){
         #all listings
         $this->listingAll=PropertyTable::with('user')->get();
         $this->listed=PropertyTable::with('user')->where('property_process->status','approved')->get();
         $this->unlisted=PropertyTable::with('user')->where('property_process->status','completed')->get();
         $this->inprogress=PropertyTable::with('user')->where('property_process->status','pending')->get();

     }

    
    #approve listing
    public function Approvelisting($id){
        try{
            $approveListing=PropertyTable::where(['id'=>$id])->update([
                'property_process->status'=>'approved'
            ]);
            if($approveListing){
                #listing details 
                $listingDetails=PropertyTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->agent_id)->first();

                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new ListingApproval($useremail,$UserName));

                session()->flash('success','Listing have been approved user will receive an email shortly');
                return redirect('/admin/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/listing');
        }
    }

     #decline listing
     public function DeclineListing($id){
        try{
            $declinedListing=PropertyTable::where(['id'=>$id])->update([
                'property_process->status'=>'completed'
            ]);
            if($declinedListing){
                #listing details 
                $listingDetails=PropertyTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->agent_id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new ListingDecline($useremail,$UserName));

                session()->flash('success','Listing have been unlisted user will receive an email shortly');
                return redirect('/admin/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error',$g->getMessage());
            return redirect('/admin/listing');
        }
    }


     #delete listing
     public function DeleteListing($id){
         try{
           
                #listing details 
                $listingDetails=PropertyTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->agent_id)->first();

                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new ListingDelete($useremail,$UserName));

                #delete listing 
                $deleteListing=PropertyTable::where(['id'=>$id])->delete();

                session()->flash('success','Listing have been deleted user will receive an email shortly');
                return redirect('/admin/listing');
            
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/listing');
        }
    }



    public function render(){

        return view('livewire.adminlisting-manager');
    }
}
