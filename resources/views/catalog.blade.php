@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Каталог</h2>
    <form action="{{ route('catalog') }}" method="get">
    <div class="d-flex justify-content-start">
        <select class="form-select m-5 ms-0" style="width: 250px;" name="sort">
            <option value="">Сортировка</option>
            <option value="producer" {{ request('sort') == 'producer' ? 'selected' : '' }}>По производителю</option>
            <option value="substance" {{ request('sort') == 'substance' ? 'selected' : '' }}>По действующему веществу</option>
            <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>По цене</option>
        </select>

        <select class="form-select m-5" style="width: 250px;" name="category">
            <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>Все категории</option>
            @foreach ($categories as $a)
                <option value="{{ $a->id_category }}" {{ request('category') == $a->id_category ? 'selected' : '' }}>
                    {{ $a->category_name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary m-5">Фильтр</button>
    </div>
</form>

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($array as $a)
                <div class="col">
                    <div class="card h-100">
                        <div class="text-center p-3" style="height: 220px;">
                            <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body ">
                            <h5 class="card-title">{{ $a->product_name }}</h5>
                            <p class="card-text">{{ $a->price }} ₽</p>
                            <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                            <a href="{{ route('basket',  $a->id_product) }}" class="btn btn-success btn-sm">В корзину</a>
                            @auth
                                @if(Auth::user()->id_role == 2)
                                    <a href="{{ route('editProductView',['id'=>$a->id_product]) }}" class="btn btn-outline-primary btn-sm">Редактировать товар</a>

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
