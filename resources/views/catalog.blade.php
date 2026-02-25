@extends('layouts.app')

@section('content')
    <h2 class="m-5">Каталог</h2>
    {{-- <form action="{{ route('catalog') }}" method="get">
        @csrf
        <div class="d-flex justify-content-start">
            <select class="form-select m-5" aria-label="Default select example" style="width: 250px;" name="filter">
                <option value="yearFilter">По году производства</option>
                <option value="nameFilter">По наименованию</option>
                <option value="costFilter">По цене</option>
            </select>

            <select class="form-select m-5" aria-label="Default select example" style="width: 250px;" name="id_category">
                @foreach ($categories as $a)
                    <option value="{{ $a->id_category }}">{{ $a->name_category }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary m-5">Отфильтровать</button>
        </div>
    </form> --}}

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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
