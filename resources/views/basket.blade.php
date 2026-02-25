@extends('layouts.app')

@section('content')
    <h1 class="m-5 mb-0">Корзина</h1>
    <div class="d-flex justify-content-center">
        <div class="card mb-3 m-5" style="width: 70em;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($basket->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fs-1">{{ $basket->product_name }}</h5>
                        <p class="card-text fs-4">{{ $basket->price }} ₽</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="height: 20px width: 30rem;">
            <div class="card-body">
                <p class="card-text fs-5">Товаров:</p>
                <form action="{{ route('product',['id'=>$basket->id_product]) }}">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">-</button>
                        <button type="button" class="btn btn-primary">1</button>
                        <button type="button" class="btn btn-primary">+</button>
                    </div><br>
                    <br><p class="card-text fs-5">Скидка: 0$</p>
                    <p class="card-text fs-5">Адресс: ул.Пушкина д.Колотушкина</p>
                    <p class="card-text fs-5">{{ $basket->price }}$</p>
                    {{-- <a href="{{ route('order', parameters: $basket->id_product) }}" class="btn btn-primary fs-5">Купить</a> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
