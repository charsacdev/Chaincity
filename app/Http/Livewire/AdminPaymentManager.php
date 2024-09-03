<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\PaymentTable;
use App\Models\CtripPayment;

use Livewire\Component;

class AdminPaymentManager extends Component
{
   #payment details
   public $completed,$pending,$tripcompleted,$trippending;

   public function mount(){
       #all payments
       $this->completed=PaymentTable::with('user')->where('transaction_status','completed')->get();
       $this->pending=PaymentTable::with('user')->where('transaction_status','pending')->get();

       $this->tripcompleted=CtripPayment::with('user')->where('transaction_status','completed')->get();
       $this->trippending=CtripPayment::with('user')->where('transaction_status','pending')->get();

   }

   
   #approve Transaction chaincity
   public function ApproveTxn($id){
       try{
           $approveListing=PaymentTable::where(['id'=>$id])->update([
               'transaction_status'=>'completed'
           ]);
           if($approveListing){
               session()->flash('success','Transaction have been marked as confirmed');
               return redirect('/admin/payment');
           }
       }
       catch(\Throwable $g){
           session()->flash('error','An error occured');
           return redirect('/admin/payment');
       }
    }

    #decline Transaction chaincity
    public function DeclineTxn($id){
        try{
            $approveListing=PaymentTable::where(['id'=>$id])->update([
                'transaction_status'=>'pending'
            ]);
            if($approveListing){
                session()->flash('success','Transaction have been marked as declined');
                return redirect('/admin/payment');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/payment');
        }
    }

    #delete Transaction chaincity
    public function DeleteTransaction($id){
       try{
           $deletetransaction=PaymentTable::where(['id'=>$id])->delete();
           if($deletetransaction){
               session()->flash('success','Transaction have been deleted user will receive an email shortly');
               return redirect('/admin/payment');
           }
       }
       catch(\Throwable $g){
           session()->flash('error','An error occured');
           return redirect('/admin/payment');
       }
   }



    #approve Transaction chaincity
    public function ApproveTxnTrip($id){
        try{
            $approveListing=CtripPayment::where(['id'=>$id])->update([
                'transaction_status'=>'completed'
            ]);
            if($approveListing){
                session()->flash('success','Transaction have been marked as confirmed');
                return redirect('/admin/payment');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/payment');
        }
    }
 
     #decline Transaction chaincity
     public function DeclineTxnTrip($id){
         try{
             $approveListing=CtripPayment::where(['id'=>$id])->update([
                 'transaction_status'=>'pending'
             ]);
             if($approveListing){
                 session()->flash('success','Transaction have been marked as declined');
                 return redirect('/admin/payment');
             }
         }
         catch(\Throwable $g){
             session()->flash('error','An error occured');
             return redirect('/admin/payment');
         }
    }
 
 
     #delete Transaction chaincity
     public function DeleteTransactionTrip($id){
        try{
            $deletetransaction=CtripPayment::where(['id'=>$id])->delete();
            if($deletetransaction){
                session()->flash('success','Transaction have been deleted user will receive an email shortly');
                return redirect('/admin/payment');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/payment');
        }
    }
   
    public function render()
    {
        return view('livewire.admin-payment-manager');
    }
}
