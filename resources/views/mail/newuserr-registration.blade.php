@component('mail::panel')
  Account Creation Notification
@endcomponent
@component('mail::message')
<center>
  <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
 </center>
 <br>
   <h1 style="text-align:center;color:#D80450">Welcome to ChainCity Real Estate</h1>
    <p>Dear {{$UserName}},<br>
    We are thrilled to welcome you to ChainCity Real Estate, 
    your trusted partner in finding your dream home.
    <br><br>
    <a href="{{env('URL_LINK')}}/verify-account/{{base64_encode($useremail)}}/{{base64_encode($authcode)}}">
        <button style="background-color:#D80450;color:#fff;border:0px;width:100%;height:40px;border-radius:9px">
            Verify account
        </button>
     </a>
     <br><br>
    At ChainCity, we understand that buying or selling a home is a significant decision, and we are here to support you every step of the way. Our team of experienced real estate professionals is dedicated to helping you achieve your real estate goals.</p>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


