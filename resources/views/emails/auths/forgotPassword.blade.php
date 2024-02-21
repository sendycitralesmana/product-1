@component('mail::message')

Hello {{ $user->name }}

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Password
@endcomponent

Silahkan klik tombol diatas untuk melakukan reset password akun anda.<br>
{{ config('app.name') }}
@endcomponent
