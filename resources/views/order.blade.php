@extends('layouts.app')

@section('content')
<div class="card m-5 text-center">
    <div class="card-body">
        <h2 class="text-success">Заказ оформлен!</h2><br>
        <h6>Ваш заказ:</h6>
        <p>Товар: {{ $product }}</p>
        <p>Количество: {{ $quantity }}</p>
        <p>Сумма: {{ $total }} ₽</p>
        <p>Получатель: {{ $name }}</p>
        <p>Адрес: {{ $address }}</p>
        <p>Телефон: {{ $phone }}</p>
        <a href="{{ route('catalog') }}" class="btn btn-primary mt-3">В каталог</a>
        <a href="{{ route('profile') }}" class="btn btn-success mt-3">В личный кабинет</a>
    </div>
</div>
@endsection
