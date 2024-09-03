@component('mail::panel')
Your Listing Reservation Notification
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">Your Listing Reservation Notification</h1>
    <p>Dear {{$UserName}},<br>
      We are thrilled to inform you to that one of your <b>Listing</b> have being reserved and earning have being credited
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,Best Regards<br>
{{ config('app.name') }}
@endcomponent


