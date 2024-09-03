<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifications;

class HeaderNotitification extends Controller
{
     #notification
     public function NotificationList(Request $request){
      
       $selectNotification=notifications::where(['user_id'=>auth()->user()->id])->latest()->take(5)->get();
       return view('agents.agentheader')->with(['data'=>$selectNotification]);
  }
}
