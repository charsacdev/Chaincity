@component('mail::panel')
ChainCity Listing Declined
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">ChainCity Listing Declined Notification</h1>
    <p>Dear {{$UserName}},<br>
      We are sorry to inform you that your <b>Listing have been declined</b> and can not be made publicly avaliable
      please try adding a new listing
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


