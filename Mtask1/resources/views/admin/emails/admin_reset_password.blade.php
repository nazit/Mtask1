@component('mail::message')
# Reset Acount
welcom {{$data['data']->name}}
<br>

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent
OR Copy the link<br>

<a href="{{aurl('reset/password/'.$data['token'])}}">{{aurl('reset/password/'.$data['token'])}}</a>
<br>Thanks<br>
{{ config('app.name') }}
@endcomponent

