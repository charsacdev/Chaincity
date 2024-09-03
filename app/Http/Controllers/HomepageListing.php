<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;
use App\Models\ReviewTables;

class HomepageListing extends Controller
{
    #selecting listing
    public function show(){
        #all listing
        $selectAsset=PropertyTable::with('Rating')->where(['property_process->status'=>'approved'])
        ->inRandomOrder()
        ->limit(12)
        ->get();

        #select city
        $selectCity=PropertyTable::where(['property_process->status'=>'approved'])
        #->where('agent_id','!=',auth()->guard('web')->user()->id)
        ->select('property_city')->distinct()->get();
        
        #select type
        $selectyType=PropertyTable::where(['property_process->status'=>'approved'])
        #->where('agent_id','!=',auth()->guard('web')->user()->id)
        ->select('property_type')->distinct()->get();

        #reviews
        $selectReviews=ReviewTables::where('approval','approved')->with('user')->inRandomOrder()->take(10)->get();
        return view('homepages.home')->with(['data'=>$selectAsset,'city'=>$selectCity,'type'=>$selectyType,'reviews'=>$selectReviews]);
    }


    #about us
    public function about(){
         #reviews
         $selectReviews=ReviewTables::where('approval','approved')->with('user')->inRandomOrder()->take(10)->get();
         return view('homepages.about')->with(['reviews'=>$selectReviews]);
    }

    #all listing
    public function properties(){
         $selectProperties=PropertyTable::where(['property_process->status'=>'approved'])
         ->inRandomOrder()
         ->take(40)
         ->get();
         return view('homepages.property')->with(['data'=>$selectProperties]);
    }


    #search listing based on location
    public function searchlisting(Request $request){
         #dd($request->location);
        $selectProperties=PropertyTable::where('property_price','<',$request->pricerange)
        ->where(['property_city'=>$request->location,'property_type'=>$request->property_type,'property_process->status'=>'approved'])
        ->inRandomOrder()
        ->take(40)
        ->get();
        return view('homepages.property')->with(['data'=>$selectProperties]);
   }


   #search listing based on location
   public function searching(Request $request){
     #dd($request->location);
    $selectProperties=PropertyTable::where('property_price','<',$request->pricerange)
    ->where(['property_city'=>$request->location,'property_type'=>$request->property_type,'property_process->status'=>'approved'])
    ->inRandomOrder()
    ->get();
    return view('homepages.property')->with(['data'=>$selectProperties]);
}

  
    

}
