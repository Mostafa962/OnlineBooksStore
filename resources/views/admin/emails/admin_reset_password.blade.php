@component('mail::message')
# Reset Account
Welcome{{$data['data']->name}}<br>
The body of your message.

@component('mail::button', ['url' => adminURL('reset/password/'.$data['token'])])
Reset Now
@endcomponent
or Copy this link and open in your browser <br>
<a href="{{ adminURL('reset/password/'.$data['token'])}}">{{adminURL('reset/password/'.$data['token'])}}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent