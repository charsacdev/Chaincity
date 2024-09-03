<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\AdminTable;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;
    
    #update profile variables
    public $photo,$fname,$lname,$address,$email,$phone,$country,$state,$city,$agentpercentage,$tripagentpercentage,$coinbaseapi;
    
    #password
    public $oldpassword,$newpassword,$confirmpassword;

    #temporay url
    public $temporarySignedUrl;

    protected $rules=[
        'photo' => 'required|image|mimes:png,jpeg,jpg',
     ];

     #handling updated values
     public function updated($propertyName){
        $this->validateOnly($propertyName);
     }

    #mount
    public function mount(){

        $this->fname=auth()->guard('admin')->user()->first_name;
        $this->lname=auth()->guard('admin')->user()->last_name;
        $this->email=auth()->guard('admin')->user()->email;
        $this->phone=auth()->guard('admin')->user()->phone;
        $this->occupation=auth()->guard('admin')->user()->occupation;
        $this->address=auth()->guard('admin')->user()->address;
        $this->country=auth()->guard('admin')->user()->country;
        $this->state=auth()->guard('admin')->user()->state;
        $this->city=auth()->guard('admin')->user()->city;

        #check for master
        if(auth()->guard('admin')->user()->account_type=="master"){

            $this->agentpercentage=auth()->guard('admin')->user()->agent_percent;
            $this->tripagentpercentage=auth()->guard('admin')->user()->chaincitytrip_percent;
            $this->coinbaseapi=auth()->guard('admin')->user()->apikey;
        }
        else{
            $this->agentpercentage="0";
            $this->tripagentpercentage="0";
            $this->coinbaseapi="0";
        }
        
    }


    #change image
    public function imagechanger(){
        try{
             $this->validate();
            
        }
        catch(\Throwable $gt){
            #dd("yes boss");
            #session()->flash('error',$gt->getMessage());
            #session()->flash('error','Oh snap, we dont this is an image.');
        }
        
    }
    
    #update user profile
    public function UpdateprofileAdmin(){
          try{
                #check if profile image exisit
                $profileImage=auth()->guard('admin')->user()->profile_photo;

            
                #url 
                if(!$this->photo==null){
                    $fileurl=$this->photo->store('/', 'profile_photo');
                    $awsurl="https://chaincity-s3bucket.s3.amazonaws.com/profile_images/";

                    $awsphotolink=$awsurl.$fileurl;
                }
                else{
                    $awsphotolink=$profileImage;
                }
                

                    #update profile
                        $updateprofile=AdminTable::where(['id'=>auth()->guard('admin')->user()->id])->update([
                            'first_name'=>$this->fname,
                            'last_name'=>$this->lname,
                            'email'=>$this->email,
                            'phone'=>$this->phone,
                            'profile_photo'=>$awsphotolink,
                            'occupation'=>$this->occupation,
                            'address'=>$this->address,
                            'country'=>$this->country,
                            'state'=>$this->state,
                            'city'=>$this->city,
                            'agent_percent'=>$this->agentpercentage,
                            'chaincitytrip_percent'=>$this->tripagentpercentage,
                            'apikey'=>$this->coinbaseapi
                        ]);
                        if($updateprofile){

                            session()->flash('succeed','Profile updated successfully');
                            return redirect("admin/profile");
                    }
             }

        catch(\Throwable $g){
                dd($g->getMessage());
        }
    }


     #user update password 
     public function UpdatePassword(){
        if(!Hash::check($this->oldpassword, auth()->guard('admin')->user()->password)){
            
            session()->flash('error-pwsd','Old password is not correct');
        }
        elseif($this->confirmpassword!==$this->newpassword){

            session()->flash('error-pwsd','Confirm Password and New Password does not match');
        }
        else{
            $updatePassword=AdminTable::where(['id'=>auth()->guard('admin')->user()->id])->update([
                'password'=>Hash::make($this->newpassword)
            ]);
            if($updatePassword){
                session()->flash('succeed-pwsd','Password updated successfully');
            }
        }
       
    }

    public function render()
    {
        return view('livewire.admin-profile');
    }
}
