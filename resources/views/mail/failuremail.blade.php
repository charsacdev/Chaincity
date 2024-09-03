@component('mail::panel')
ChainCity Payment Notification
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">Failed Payment Notification</h1>
    <p>Dear {{$UserName}},<br>
      We are sorry to inform you that your <b>payment was unsuccessful</b> and your reservation can not be made at this time 
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


