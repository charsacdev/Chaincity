<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\notifications;

class Admindashboardheader extends Component
{
    public $selectNotification;


    public function mount(){

        $this->selectNotification=notifications::latest()->take(3)->get();
    }


    public function render()
    {
        return view('livewire.admindashboardheader');
    }
}
