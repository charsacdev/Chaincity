@component('mail::panel')
  Password Reset Notification
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">ChainCity Password Reset</h1>
    <p>Dear {{$username}},<br>
    We are we noticed you requested to reset your password, your account security is important to us, click the link below to proceed
    <br><br>
    <a href="{{env('URL_LINK')}}/newpassword/{{base64_encode($email)}}/{{base64_encode($authcode)}}">
        <button style="background-color:#D80450;color:#fff;border:0px;width:100%;height:40px;border-radius:9px">
            Reset password
        </button>
     </a>
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


