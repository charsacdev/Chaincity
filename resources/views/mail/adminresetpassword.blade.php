@component('mail::panel')
  Admin Password Reset Nofitication
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">ChainCity Admin Password Reset</h1>
    <p>Hello Admin <b>{{$username}}</b>,<br>
    We are we noticed you requested to reset your password, your account security is important for system security, click the link below to proceed
    <br><br>
    <a href="{{env('URL_LINK')}}/admin/newpassword/{{base64_encode($email)}}/{{base64_encode($authcode)}}">
        <button style="background-color:#D80450;color:#fff;border:0px;width:100%;height:40px;border-radius:9px">
            reset password
        </button>
     </a>
     <br><br>
  </p>
    
Thanks,Best Regards<br>
{{ config('app.name') }}
@endcomponent


