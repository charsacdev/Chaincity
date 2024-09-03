@component('mail::panel')
Message Inquiry
@endcomponent
@component('mail::message')
<center>
    <img src="{{asset('asset/logo.png')}}" class="logo" alt="Website Logo" style='width:auto;height:320px'>
   </center>
   <br>
   <h1 style="text-align:center;color:#D80450">Message Inquiry</h1>
    <p>
        <h4>From : {{$username}}</h4>
        <h4>Email : {{$email}}</h4>
        {{$message}}
    </p>
    <br>
    
Thanks,<br>
Best of Regards<br>
{{ config('app.name') }}
@endcomponent


