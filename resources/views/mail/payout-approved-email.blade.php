@component('mail::panel')
    @if ($emailType=="chaincity")
     Chaincity Agent Payout Notification 
    @else
      Chaincity Trip Agent Payout Notification 
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
        Chaincity Agent Payout Notification
      @else
        Chaincity Trip Agent Payout Notification
      @endif
    </h1>
    <p>Dear <b>{{$UserName}}</b>,<br>
      We are thrilled to inform you that the sum of <b>${{number_format($Amount)}}</b> have being credited to your
      <b>{{$WalletType}}</b> wallet address <b>{{$WalletAddress}}</b> from your earnings.
     <br><br>
     We appreciate your contribution to the growth of the plaform.
    </p>
    
Thanks,<br>
Best of Regards<br>
@if ($emailType=="chaincity")
{{ config('app.name') }}
@else
  Chaincity Trip
@endif
@endcomponent


