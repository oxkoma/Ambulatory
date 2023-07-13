@component('mail::message')
# Зміна статусу

Шановний/а {{$order->fname}} {{$order->lname}}!

Ваш запис до доктора {{ $doctor->fname }}
{{ $doctor->lname }} було підтвержено.

Чекаємо Вас {{ $order->date->format('d-m-Y') }} о {{ $order->time->format('H:i') }} в
{{ $ambulatories[$order->ambulatory_id]->name }}
за
адресой
{{ $ambulatories[$order->ambulatory_id-1]->address }}

@component('mail::button', ['url' => 'https:://ambulatory.com.ua'])
Наш сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent