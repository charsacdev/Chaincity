@component('mail::panel')
   @if ($emailType=="chaincity")
       ChainCity Account Blocking 
    @else
      ChainCity Trip Account Blocking
    @endif
@endcomponent
@component('mail::message')
<center>
  @if ($emailType=="chaincity")
    <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
  @else
     <img src="{{asset('asset/triplogo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
  @endif
 </center>
 <br>
   <h1 style="text-align:center;color:{{ $emailType=='chaincity' ? '#D80450' : '#0ace7e' }}">
     @if($emailType=="chaincity")
       ChainCity Account Blocking Notification
      @else
        ChainCity Trip Account Blocking Notification
      @endif
  </h1>
    <p>Dear {{$UserName}},<br>
      We are sorry to inform you that your <b>account have been blocked</b> and you can not have access to our services anymore 
      please message support to get your account back again.
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,<br>
Best of Regards<br>
@if ($emailType=="chaincity")
{{ config('app.name') }}
@else
  Chaincity Trip
@endif
@endcomponent


