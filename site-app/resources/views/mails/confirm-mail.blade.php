@component('mail::message')
# Зміна статусу

Шановний/а {{$order->fname}} {{$order->lname}}!

Ваш запис до доктора {{ $doctors[$order->doctor_id-1]->fname }}
{{ $doctors[$order->doctor_id-1]->lname }} було підтвержено.

Чекаємо Вас {{ $order->date }} о {{ $order->time }} в {{ $ambulatories[$order->ambulatory_id]->name }} за адресой
{{ $ambulatories[$order->ambulatory_id-1]->address }}

@component('mail::button', ['url' => 'https:://ambulatory.com.ua'])
Наш сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent