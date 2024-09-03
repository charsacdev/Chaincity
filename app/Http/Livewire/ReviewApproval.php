<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\ChaincityTripUser;
use App\Models\PropertyTable;
use App\Models\ReviewTables;
use App\Models\CtripReviews;


class ReviewApproval extends Component
{
     #payment details
     public $chaincityReviews,$chaincityTripReviews;

     #chaincity Review details
     public $chainCityReviewId,$cityusername,$cityreviewmessage;

     #chaincity trip Review details
     public $chainCityTripReviewId,$tripusername,$tripreviewmessage;

     public function mount(){
         #chaincity and chaincity trip review
         $this->chaincityReviews=ReviewTables::where('approval','pending')->with('user')->latest()->get();
         $this->chaincityTripReviews=CtripReviews::where('approval','pending')->with('user')->latest()->get();
         
     }

     #chancity review popup
     public function ReviewpopupCity($id){
        $review=ReviewTables::where(['id'=>$id])->first();

        #getting user details
        $userReview=UsersTable::where('id',$review->user_id)->first();

        #popup details
        $this->cityusername=$userReview->first_name." ".$userReview->last_name;
        $this->cityreviewmessage=$review->rating_message;
        $this->chainCityReviewId=$review->id;
        

     }
 
     #approve review
     public function ApproveChaincityReview($id){
         $review=ReviewTables::where(['id'=>$this->chainCityReviewId])->update([
            'approval'=>'approved'
         ]);
         if($review){
            session()->flash('success', "Chaincity Review have being approved");
            return redirect('/admin/reviews');
         }     
     }

     #delete review
     public function DeleteChaincityReview($id){
        $review=ReviewTables::where(['id'=>$this->chainCityReviewId])->delete();
        if($review){
            session()->flash('success', "Chaincity Review have being deleted");
            return redirect('/admin/reviews');
         }  
      }



     #chancity Trip review popup
     public function ReviewpopupTrip($id){
        $review=CtripReviews::where(['id'=>$id])->first();

        #getting user details
        $userReview=ChaincityTripUser::where('id',$review->user_id)->first();

        #popup details
        $this->tripusername=$userReview->first_name." ".$userReview->last_name;
        $this->tripreviewmessage=$review->rating_message;
        $this->chainCityTripReviewId=$review->id;
        

     }
 
     #approve review
     public function ApproveChaincityTripReview($id){
         $review=CtripReviews::where(['id'=>$this->chainCityTripReviewId])->update([
            'approval'=>'approved'
         ]);
         if($review){
            session()->flash('success', "Chaincity Trip Review have being approved");
            return redirect('/admin/reviews');
         }     
     }

     #delete review
     public function DeleteChaincityTripReview($id){
        $review=CtripReviews::where(['id'=>$this->chainCityTripReviewId])->delete();
        if($review){
            session()->flash('success', "Chaincity Trip Review have being deleted");
            return redirect('/admin/reviews');
         }  
    }

 
 

    public function render()
    {
        return view('livewire.review-approval');
    }
}
