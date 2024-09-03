<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\ReservationTable;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCancelled;
use App\Mail\BookingCompleted;
use App\Mail\BookingOngoing;
use App\Mail\BookingUpcoming;
use App\Models\UsersTable;
use Livewire\Component;

class AdminBookingManager extends Component
{
     #property reservation
     public $reservationAll,$ongoing,$upcoming,$completed,$cancelled;


     public function mount(){
         #all reservations
         $this->reservationAll=ReservationTable::with('user','property')->get();
         $this->ongoing=ReservationTable::with('user')->where('status','ongoing')->get();
         $this->upcoming=ReservationTable::with('user')->where('status','upcoming')->get();
         $this->completed=ReservationTable::with('user')->where('status','completed')->get();
         $this->cancelled=ReservationTable::with('user')->where('status','cancelled')->get();

     }

    
    #completed Booking
    public function CompletedBooking($id){
        try{
            $completedBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'completed'
            ]);
            if($completedBooking){

                $reservations=ReservationTable::where(['id'=>$id])->first();
                
                $reserveProperty=PropertyTable::where('id',$reservations->property_id)->update([
                    'property_process->status'=>'approved'
                  ]);

                #listing details 
                $listingDetails=ReservationTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->user_id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new BookingCompleted($useremail,$UserName));

                session()->flash('success','Reservation have been manually marked as completed,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    #ongoing booking
    public function OngoingBooking($id){
        try{
            $ongoingBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'ongoing'
            ]);
            if($ongoingBooking){

                $reservations=ReservationTable::where(['id'=>$id])->first();
                $reserveProperty=PropertyTable::where('id',$reservations->property_id)->update([
                    'property_process->status'=>'booked'
                  ]);

                #listing details 
                $listingDetails=ReservationTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->user_id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new BookingOngoing($useremail,$UserName));

                session()->flash('success','Reservation have been manually marked as ongoing,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error',$g->getMessage());
            return redirect('/admin/booking');
        }
    }

    #upcoming booking
    public function UpcomingBooking($id){
        try{
            $upcomingBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'upcoming'
            ]);
            if($upcomingBooking){

                #listing details 
                $listingDetails=ReservationTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->user_id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new BookingUpcoming($useremail,$UserName));

                session()->flash('success','Reservation have been manually marked as upcoming,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    
    #cancelled booking
    public function CancelledBooking($id){
        try{
            $cancelledBooking=ReservationTable::where(['id'=>$id])->update([
                'status'=>'cancelled'
            ]);
            if($cancelledBooking){

                $reservations=ReservationTable::where(['id'=>$id])->first();
                $reserveProperty=PropertyTable::where('id',$reservations->property_id)->update([
                    'property_process->status'=>'approved'
                  ]);

                #listing details 
                $listingDetails=ReservationTable::where(['id'=>$id])->first();

                #user details
                $userDetails=UsersTable::where('id',$listingDetails->user_id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new BookingCancelled($useremail,$UserName));

                session()->flash('success','Reservation have been manually marked as cancelled,user will receive an email shortly');
                return redirect('/admin/booking');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/booking');
        }
    }

    public function render()
    {
        return view('livewire.admin-booking-manager');
    }
}
