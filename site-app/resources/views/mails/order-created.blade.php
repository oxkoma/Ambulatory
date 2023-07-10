<p>Шановний/а {{ $order->fname }} {{ $order->lname}}</p>
<p>Ми отримали Ваш попередній запис:
	{{ $order->date }},
	{{ $ambulatories[$order->ambulatory_id]->name }}, {{ $ambulatories[$order->ambulatory_id-1]->address }}
	до доктора {{ $doctors[$order->doctor_id-1]->fname }} {{ $doctors[$order->doctor_id-1]->lname }}.
	Очикуйте дзвінка нашого менеджера</p>