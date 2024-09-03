<?php

namespace App\Http\Livewire;
use App\Models\UsersTable;
use App\Models\ChaincityTripUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserAdminVerifyAccount;
use App\Mail\UserAdminRejectAccount;
use App\Mail\UserAdminBlockAccount;

use Livewire\Component;

class AdminUserManager extends Component
{
     #all users
     public $CityVerifiedUser,$CityUnVerifiedUser,$TripVerifiedUser,$TripUnVerifiedUser;


     public function mount(){
         #all users
         $this->CityVerifiedUser=UsersTable::with('property','bookings','listingsaved')
         ->where(['account_kyc->verify_status'=>'completed'])
         ->withSum('earnings','amount')
         ->get();

         $this->CityUnVerifiedUser=UsersTable::with('property','bookings','listingsaved')
         ->where(['account_kyc->verify_status'=>'pending'])
         ->withSum('earnings','amount')
         ->get();


         #all users
         $this->TripVerifiedUser=ChaincityTripUser::with('property','bookings','listingsaved')
         ->where(['account_kyc->verify_status'=>'completed'])
         ->withSum('earnings','amount')
         ->get();

         $this->TripUnVerifiedUser=ChaincityTripUser::with('property','bookings','listingsaved')
         ->where(['account_kyc->verify_status'=>'pending'])
         ->withSum('earnings','amount')
         ->get();
     }

    
    #approved users
    public function Approveusers($id){
        try{
            $approveListing=UsersTable::where(['id'=>$id])->update([
                'account_status'=>'verified',
                'account_kyc->verify_status'=>'completed'
            ]);
            if($approveListing){
                

                #user details
                $userDetails=UsersTable::where('id',$id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                $emailType="chaincity";
                Mail::to($useremail)->send(new UserAdminVerifyAccount($useremail,$UserName,$emailType));

                session()->flash('success','user account have been verified successfully');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }

     #decline users
     public function Declineusers($id){
        try{
            $declinedListing=UsersTable::where(['id'=>$id])->update([
                'account_status'=>'verified',
                'account_type'=>'agent',
                'account_kyc->verify_status'=>'pending'
            ]);
            if($declinedListing){
               #user details
               $userDetails=UsersTable::where('id',$id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                $emailType="chaincity";
                Mail::to($useremail)->send(new UserAdminRejectAccount($useremail,$UserName,$emailType));

                session()->flash('success','User verification was declined, user will receive an email shortly');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }


     #block user
     public function Blockuser($id){
        try{
            $blockuser=UsersTable::where(['id'=>$id])->update([
                'account_kyc->verify_status'=>'pending',
                'account_status'=>'blocked'
            ]);
            if($blockuser){
                #user details
                $userDetails=UsersTable::where('id',$id)->first();

                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                $emailType="chaincity";
                Mail::to($useremail)->send(new UserAdminBlockAccount($useremail,$UserName,$emailType));

                session()->flash('success','User have been blockd and will receive an email shortly');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }



    #approved users
    public function ApproveusersTrip($id){
        try{
            $approveListing=UsersTable::where(['id'=>$id])->update([
                'account_status'=>'verified',
                'account_kyc->verify_status'=>'completed'
            ]);
            if($approveListing){
                

                #user details
                $userDetails=UsersTable::where('id',$id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                $emailType="chaincitytrip";
                Mail::to($useremail)->send(new UserAdminVerifyAccount($useremail,$UserName,$emailType));

                session()->flash('success','user account have been verified successfully');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }

     #decline users
     public function DeclineusersTrip($id){
        try{
            $declinedListing=UsersTable::where(['id'=>$id])->update([
                'account_status'=>'verified',
                'account_type'=>'agent',
                'account_kyc->verify_status'=>'pending'
            ]);
            if($declinedListing){
               #user details
               $userDetails=UsersTable::where('id',$id)->first();
          
                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                $emailType="chaincitytrip";
                Mail::to($useremail)->send(new UserAdminRejectAccount($useremail,$UserName,$emailType));

                session()->flash('success','User verification was declined, user will receive an email shortly');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }


     #block user
     public function BlockuserTrip($id){
        try{
            $blockuser=UsersTable::where(['id'=>$id])->update([
                'account_kyc->verify_status'=>'pending',
                'account_status'=>'blocked'
            ]);
            if($blockuser){
                #user details
                $userDetails=UsersTable::where('id',$id)->first();

                #send email to admin and users
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                $emailType="chaincitytrip";
                Mail::to($useremail)->send(new UserAdminBlockAccount($useremail,$UserName,$emailType));

                session()->flash('success','User have been blockd and will receive an email shortly');
                return redirect('/admin/users');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/users');
        }
    }



    public function render()
    {
        return view('livewire.admin-user-manager');
    }
}
