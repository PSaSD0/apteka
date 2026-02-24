@extends('layouts.app')

@section('content')
    <h1 class="m-5">Добавить товар:</h1>
    <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5" style="width: 18rem;">
            <div class="card-body">
                <label class="form-label" for="image">Добавить фото</label>
                <input class="form-control" type="file" id="image" name="image" required accept="image/*">

                <label class="form-label mt-3" for="id_category">Выбор категории</label>
                <select class="form-select" name="id_category" id="id_category">
                    @foreach ($categories as $a)
                        <option value="{{ $a->id_category }}">{{ $a->category_name }}</option>
                    @endforeach
                </select>

                <label class="form-label mt-3" for="nameProduct">Название товара</label>
                <input class="form-control" type="text" id="nameProduct" name="nameProduct" required>

                <label class="form-label mt-3" for="descriptionProduct">Описание товара</label>
                <input class="form-control" type="text" id="descriptionProduct" name="descriptionProduct" required>

                <label class="form-label mt-3" for="productExpirationDate">Срок годности</label>
                <input class="form-control" type="text" id="productExpirationDate" name="productExpirationDate" required>

                <label class="form-label mt-3" for="productProducer">Производитель</label>
                <input class="form-control" type="text" id="productProducer" name="productProducer" required>

                <label class="form-label mt-3" for="productActiveSubstance">Действующее вещество</label>
                <input class="form-control" type="text" id="productActiveSubstance" name="productActiveSubstance" required>

                <label class="form-label mt-3" for="costProduct">Цена товара</label>
                <input class="form-control" type="text" id="costProduct" name="costProduct" required>

                <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                <p>{{ session('messageAddProduct') }}</p>
            </div>
        </div>
    </form>

    <h1 class="m-5">Добавить категорию:</h1>
    <form action="{{ route('addCategory') }}" method="post">
        @csrf
        <div class="card p-2 m-5" style="width: 18rem;">
            <div class="card-body">
                <label for="nameCategory" class="form-label">Название категории</label>
                <input type="text" class="form-control" id="nameCategory" name="nameCategory" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
            <p>{{ session('messageAddCategory') }}</p>
        </div>
    </form>

    <h1 class="m-5">Удалить категорию:</h1>
    <form action="{{ route('dellCategory') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="card p-2 m-5" style="width: 18rem;">
            <div class="card-body">
                <select class="form-select" name="id_category">
                    @foreach ($categories as $a)
                        <option value="{{ $a->id_category }}">{{ $a->category_name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-danger mt-3">Удалить</button>
                <p>{{ session('messageDellCategory') }}</p>
            </div>
        </div>
    </form>

    {{-- <h1 class="m-5">Заказы:</h1>
    <select class="form-select m-5" aria-label="Default select example" style="width: 250px;">
        <option value="1">Новый</option>
        <option value="2">Подтвержденый</option>
        <option value="3">Отмененный</option>
    </select>

        <div class="container m-5">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Количество товаров</th>
                    <th scope="col">Товары</th>
                    <th scope="col">Время заказа</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Дмитрий Дима Дмитриевич</td>
                    <td>Новый</td>
                    <td>1 товар</td>
                    <td>принтер</td>
                    <td>20:15:22</td>
                    <td><a href="#" class="btn btn-primary">Принять</a></td>
                    <td><a href="#" class="btn btn-danger">Удалить</a></td>

                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Алексей Александр Александрович</td>
                    <td>Подтвержденный</td>
                    <td>1 товар</td>
                    <td>принтер</td>
                    <td>04:20:00</td>
                    <td><a href="#" class="btn btn-primary">Принять</a></td>
                    <td><a href="#" class="btn btn-danger">Удалить</a></td>

                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Андрей Алекчандрович Андреев</td>
                    <td>Новый</td>
                    <td>1 товар</td>
                    <td>принтер</td>
                    <td>17:10:52</td>
                    <td><a href="#" class="btn btn-primary">Принять</a></td>
                    <td><a href="#" class="btn btn-danger">Удалить</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection
