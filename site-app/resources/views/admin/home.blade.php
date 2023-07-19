@extends('layouts.admin-dash-layout')
@section('header', 'Головна')

@section('content')
<div class="d-flex flex-column">
	<h2 class="text-center">Вітаємо в кабінеті адміністратора!</h2>
	<p></p>
	<p>Це інформаційна сторінка, де будуть публікуватися інформаційні повідомлення щодо функціонування цього
		кабінету.
	</p>
	<p>Зараз Вам доступні чотири розділи:</p>
	<ul>
		<li>Лікарі</li>
		<li>Розклад</li>
		<li>Записи на прийом</li>
		<li>Публікації</li>
	</ul>
</div>

@endsection