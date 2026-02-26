@extends('layouts.app')

@section('content')
    <h2 class="m-5">Результаты поиска: {{ $search }}</h2>

    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($results as $a)
        <div class="col">
            <div class="card h-100">
                <div class="text-center p-3" style="height: 200px;">
                    <img src="{{ asset($a->image) }}"class="img-fluid"style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                </div>
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
        @endforeach
    </div>
</div>
@endsection
