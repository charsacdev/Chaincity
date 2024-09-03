@component('mail::panel')
ChainCity Booking Cancellation
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">ChainCity Booking Cancellation Notification</h1>
    <p>Dear {{$UserName}},<br>
      We want to inform you that your <b>Reservation have being cancelled</b> and will be avaliable for booking
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,Best Regards<br>
{{ config('app.name') }}
@endcomponent


