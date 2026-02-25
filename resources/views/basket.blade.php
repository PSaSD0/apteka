@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Корзина</h2>
    <div class="d-flex justify-content-center">
        <div class="card mb-3 m-5" style="width: 70em; height: 25em;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($basket->image) }}" class="img-fluid m-2" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-title">{{ $basket->product_name }}</p>
                        <h4 class="card-text d-flex justify-content-end me-3">{{ $basket->price }} ₽</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <form action="{{ route('order') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_product" value="{{ $basket->id_product }}">

                    <p class="card-text">Количество:</p>
                    <div class="d-flex align-items-center border rounded p-1" style="width: fit-content;">
                        <button class="btn btn-link text-dark text-decoration-none px-3" style="font-size: 20px;" onclick="document.getElementById('qty').stepDown()">−</button>
                        <input type="number" id="qty" name="quantity" class="form-control text-center border-0" value="1" min="1" max="10" readonly style="width: 60px; background: transparent;">
                        <button class="btn btn-link text-dark text-decoration-none px-3" style="font-size: 20px;" onclick="document.getElementById('qty').stepUp()">+</button>
                    </div>

                    <p class="card-text">ФИО получателя</p>
                    <input type="text" name="name" class="form-control mb-3" required>

                    <p class="card-text">Адрес доставки</p>
                    <input type="text" name="address" class="form-control mb-3" required>

                    <p class="card-text">Телефон</p>
                    <input type="text" name="phone" class="form-control mb-3" required>

                    <button type="submit" class="btn btn-success">Подтвердить заказ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
