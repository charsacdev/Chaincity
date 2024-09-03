<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;

class Notification extends Component
{
    public $selectNotification;

    #mount function
    public function mount(){
        $this->selectNotification=notifications::where(['user_id'=>auth()->user()->id])->get();
    }

    public function render(){

        return view('livewire.notification');
    }
}
