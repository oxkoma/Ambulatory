@component('mail::message')
# Запитання з сайту від {{ $data->name }}

{{ $data->message }}


Номер телефону: {{ $data->phone }}<br />
Email: {{ $data->email }}
@endcomponent