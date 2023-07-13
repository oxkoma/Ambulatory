@component('mail::message')
# Попередній запис

Шановний/а {{$order->fname}} {{$order->lname}}!

Ваш попередній запис до доктора {{ $doctor->fname }} {{ $doctor->lname }} {{ $doctor->mname }}
{{ $order->date->format('d-m-Y') }}, в {{ $ambulatories[$order->ambulatory_id]->name }} за
адресою {{ $ambulatories[$order->ambulatory_id-1]->address }} було отримано.
Очикуйте дзвінка нашого менеджера для підтвердження запису.

@component('mail::button', ['url' => 'https:://ambulatory.com.ua'])
Наш сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent