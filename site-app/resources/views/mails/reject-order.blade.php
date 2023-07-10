@component('mail::message')
# Запис відхилено

Шановний/а {{$order->fname}} {{$order->lname}}!

Ваш запис до доктора {{ $doctors[$order->doctor_id-1]->fname }}
{{ $doctors[$order->doctor_id-1]->lname }}, {{ $order->date }}, в {{ $ambulatories[$order->ambulatory_id]->name }} за
адресою {{ $ambulatories[$order->ambulatory_id-1]->address }} було відхилено.


@component('mail::button', ['url' => 'https:://ambulatory.com.ua'])
Наш сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent