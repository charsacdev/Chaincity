@component('mail::panel')
ChainCity Reservation Notification
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">Reservation Expiration Notification</h1>
    <p>Dear {{$UserName}},<br>
      We want to kindly inform you that your <b>Reservation have expired</b> and is avaliable for booking. 
     <br><br>
     Plan to make an extention ? you make a new Reservation again.
   </p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


