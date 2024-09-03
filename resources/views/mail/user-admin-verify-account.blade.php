@component('mail::panel')
   @if ($emailType=="chaincity")
       ChainCity Agent Account Approval 
    @else
      ChainCity Trip Agent Account Approval
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
       ChainCity Agent Account Approval Notification
      @else
        ChainCity Trip Agent Account Approval Notification
      @endif
  </h1>
    <p>Dear {{$UserName}},<br>
      We are thrilled to inform you that your <b>agent profile has been apporved</b> you now have access to all the agent features
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


