@extends('layouts.app')

@section('content')
    <div class="card mb-3 m-5" style="w-10">
        <div class="row g-0">
            <div class="col-md-4 p-3">
                <img src="{{ asset($product->image) }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">Производитель: {{ $product->product_producer }}</p>
                    <p class="card-text">Действующее вещество: {{ $product->product_active_substance }}</p>
                    <p class="card-text">Срок годности: {{ $product->product_expiration_date }}</p>
                    <p class="card-text">Цена: {{ $product->price }} ₽</p>
                    <a href="" class="btn btn-success">В корзину</a>
                </div>
            </div>
        </div>
    </div>

     <h5 class="mt-4">Часто берут вместе</h5>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($array as $a)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 d-flex align-items-center p-2">
                                <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-title fw-bold">{{ $a->product_name }}</p>
                                    <p class="card-text text-primary">{{ $a->price }} ₽</p>
                                    <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                                    <a href="" class="btn btn-success btn-sm">В корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="m-0 mb-5 container p-0 card" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="assets/img/vitamin c.jpg" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-2 ps-3">
                        <p class="card-text">Bonbonc Витамин С со вкусом апельсина пастилки для детей с 3 лет 60 шт</p>
                        <a href="" class="btn btn-success mt-4">В корзину</a>
                    </div>
                </div>
            </div>
        </div>

       <div class="m-0 mb-5 container p-0 card" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 p-2">
                    <img src="assets/img/vitamin c.jpg" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-2 ps-3">
                        <p class="card-text">Bonbonc Витамин С со вкусом апельсина пастилки для детей с 3 лет 60 шт</p>
                        <a href="" class="btn btn-success mt-4">В корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <h5 class="mt-4">Описание продукта</h5>
    <p>{{ $product->product_description }}</p>
@endsection
