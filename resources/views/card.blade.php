@extends('layouts.app')

@section('content')
    <h1 class="m-5">Продукт:</h1>
    <div class="card mb-3 m-5" style="w-10">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="mb-3 m-5">
                    <label for="formFile" class="form-label">Обновить картинку:</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
            <img src="../{{ $card->photo_product }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                        <h5 class="card-title fs-1">{{ $card->name_product }}</h5>
                        <p>изменить название:</p>
                        <input class="form-control" type="text" value="Название товара" aria-label="readonly input example" readonly><br>
                        <p class="card-text fs-3">{{ $card->description_product }}</p>
                        <p>изменить описание:</p>
                        <input class="form-control" type="text" value="Описание" aria-label="readonly input example" readonly><br>
                        <p class="card-text fs-4">Год выпуска: {{ $card->year_product }}</p>
                        <p>изменить год:</p>
                        <input class="form-control" type="text" value="Год" aria-label="readonly input example" readonly><br>
                        <p class="card-text fs-4">Страна: {{ $card->country_product }}</p>
                        <p>изменить страну:</p>
                        <input class="form-control" type="text" value="Страна" aria-label="readonly input example" readonly><br>
                        <p class="card-text fs-4">Модель: {{ $card->model_product }}</p>
                        <p>изменить модель:</p>
                        <input class="form-control" type="text" value="Модель" aria-label="readonly input example" readonly><br>
                        <p class="card-text fs-4">{{ $card->price_product }}$</p>
                        <p>изменить цену:</p>
                        <input class="form-control" type="text" value="Цена" aria-label="readonly input example" readonly><br>
                        <a href="{{ route('basket', parameters: $card->id_product) }}" class="btn btn-success fs-5">В корзину</a>
                        <a href="#" class="btn btn-danger fs-5">Удалить товар</a>
                </div>
            </div>
        </div>
    </div>
@endsection
