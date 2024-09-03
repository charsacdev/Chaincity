<?php

namespace App\Http\Livewire;
use App\Models\UsersTable;
use App\Models\ChaincityTripUser;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\Earnings;
use App\Models\CtripEarnings;
use Illuminate\Support\Facades\Mail;
use App\Mail\PayoutApprovedEmail;

use Livewire\Component;

class AdminPayout extends Component
{
    #payment details
    public $completed,$pending,$tripcompleted,$trippending;

    public function mount(){
        #chaincity pending & completed earnings
        $this->completed=Earnings::distinct('user_id')
        ->withSum('earnings','amount')
        ->select('user_id')
        ->where('status','completed')
        ->get();

        $this->pending=Earnings::distinct('user_id')
        ->withSum('earnings','amount')
        ->select('user_id')
        ->where('status','pending')
        ->get();

        #chaincitytrip pending and completed earnings
        $this->tripcompleted=CtripEarnings::distinct('user_id')
        ->withSum('earnings','amount')
        ->select('user_id')
        ->where('status','completed')
        ->get();

        $this->trippending=CtripEarnings::distinct('user_id')
        ->withSum('earnings','amount')
        ->select('user_id')
        ->where('status','pending')
        ->get();

    }

    #approve transaction chaincity
    public function ApproveChaincityPayout($id){
        $Amount=Earnings::where(['user_id'=>$id,'status'=>'pending'])->sum('amount');
        
        $approvePayOut=Earnings::where(['user_id'=>$id,'status'=>'pending'])->update([
           'status'=>'completed'
        ]);
        $userDetails=UsersTable::where('id',$id)->first();

        if($approvePayOut){

            #email details for payout
            $useremail=$userDetails->email;
            $UserName=$userDetails->first_name;
            $WalletType=$userDetails->crypto_type;
            $WalletAddress=$userDetails->wallet_address;
            $emailType="chaincity";
            Mail::to($useremail)->send(new PayoutApprovedEmail($useremail,$UserName,$WalletType,$WalletAddress,$Amount,$emailType));

            session()->flash('success','Chaincity Agent have being marked as paid and will get email shortly');
            return redirect('/admin/payout');
        }
        
    }


    #approve transaction chaincitytrip
    public function ApproveChaincityTripPayout($id){
        $Amount=CtripEarnings::where(['user_id'=>$id,'status'=>'pending'])->sum('amount');
        
        $approvePayOut=CtripEarnings::where(['user_id'=>$id,'status'=>'pending'])->update([
           'status'=>'completed'
        ]);
        $userDetails=ChaincityTripUser::where('id',$id)->first();

        if($approvePayOut){

            #email details for payout
            $useremail=$userDetails->email;
            $UserName=$userDetails->first_name;
            $WalletType=$userDetails->crypto_type;
            $WalletAddress=$userDetails->wallet_address;
            $emailType="chaincitytrip";
            Mail::to($useremail)->send(new PayoutApprovedEmail($useremail,$UserName,$WalletType,$WalletAddress,$Amount,$emailType));

            session()->flash('success','Chaincity Trip agent have being marked as paid and will get email shortly');
            return redirect('/admin/payout');
        }
        
    }


    public function render()
    {
        return view('livewire.admin-payout');
    }
}
