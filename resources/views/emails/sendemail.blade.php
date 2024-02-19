<x-mail::message>
Akshay
'Hello world'

Hear is user data.

<x-mail::table>
| name         | email         | role     |
| -------------|:-------------:| --------:|
@foreach($users as $user)
| {{$user['name']}}| {{$user['email']}}| {{$user['role']}}|
@endforeach
</x-mail::table>

<x-mail::button :url="$url">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
