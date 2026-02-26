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
                    <h6 class="card-title">{{ $product->category_name }}</h6>
                    <p class="card-text">Производитель: {{ $product->product_producer }}</p>
                    <p class="card-text">Действующее вещество: {{ $product->product_active_substance }}</p>
                    <p class="card-text">Срок годности: {{ $product->product_expiration_date }}</p>
                    <p class="card-text">Цена: {{ $product->price }} ₽</p>
                    <a href="{{ route('basket', $product->id_product) }}" class="btn btn-success btn-sm mb-2">В корзину</a><br>
                    @auth
                        @if(Auth::user()->id_role == 2)
                            <a href="{{ route('editProductView',['id'=>$product->id_product]) }}" class="btn btn-outline-primary btn-sm mb-2">Редактировать товар</a>

                            <form action="{{ route('dellProduct') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

     <h5 class="mt-4">Часто берут вместе</h5>
        <div class="row row-cols-1 row-cols-md-3">
            @foreach($array as $a)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 d-flex align-items-center p-2">
                                <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $a->product_name }}</h6>
                                    <p class="card-text">{{ $a->category_name }}</p>
                                    <p class="card-text">{{ $a->price }} ₽</p>
                                    <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm me-2 mb-2">Подробнее</a>
                                    <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm mb-2">В корзину</a>
                                    @auth
                                        @if(Auth::user()->id_role == 2)
                                            <a href="{{ route('editProductView',['id'=>$a->id_product]) }}" class="btn btn-outline-primary btn-sm mb-2">Редактировать товар</a>

                                            <form action="{{ route('dellProduct') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id_product" value="{{ $a->id_product }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    <h5 class="mt-4">Описание продукта</h5>
    <p>{{ $product->product_description }}</p>
@endsection
