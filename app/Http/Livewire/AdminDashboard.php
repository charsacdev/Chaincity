<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UsersTable;
use App\Models\ChaincityTripUser;
use App\Models\Earnings;
use App\Models\CtripEarnings;
use App\Models\CtripProperty;
use App\Models\PropertyTable;
use App\Models\notifications;

class AdminDashboard extends Component
{
    public $totalRevenue,$totalUsers,$totalagent,$totalListing;

    public $notification;

    public function mount(){

        #total revenue
        $chainCityRevenue=Earnings::sum('amount');
        $chainCityTripRevenue=CtripEarnings::sum('amount');
        $this->totalRevenue=($chainCityRevenue+$chainCityTripRevenue);

        #total users
        $chainCityUser=UsersTable::where('account_type','user')->get();
        $chainCityTripUser=ChaincityTripUser::where('account_type','user')->get();
        $this->totalUsers=count($chainCityUser)+count($chainCityTripUser);


         #total users
         $chainCityAgent=UsersTable::where('account_type','agent')->get();
         $chainCityTripAgent=ChaincityTripUser::where('account_type','agent')->get();
         $this->totalagent=count($chainCityAgent)+count($chainCityTripAgent);

         #total property
         $chainCityListing=PropertyTable::count();
         $chainCityTripListing=CtripProperty::count();
         $this->totalListing=($chainCityListing+$chainCityTripListing);

         $this->selectNotification=notifications::latest()->take(3)->get();
      


    }
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
