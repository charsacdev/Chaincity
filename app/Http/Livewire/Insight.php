<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Earnings;
use App\Models\ReviewTables;

class Insight extends Component
{
    #selecting insight page
    public $earnings,$paidearnings,$month,$reviews;

    public function mount(){
       $this->earnings=Earnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'pending'])->sum('amount');
       $this->paidearning=Earnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'completed'])->sum('amount');
    
       $this->reviews=ReviewTables::with('user')->where(['user_id'=>auth()->guard('web')->user()->id,'approval'=>'approved'])->get();
    } 


    #sort based on month
    public function sortMonth(){
        #dd($this->month);
        $this->earnings=Earnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'pending'])->whereMonth('created_at', $this->month)->sum('amount');
        $this->paidearning=Earnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'completed'])->whereMonth('created_at', $this->month)->sum('amount');
    }

    public function render()
    {
        return view('livewire.insight');
    }
}
