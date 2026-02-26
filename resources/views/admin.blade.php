@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Добавить товар</h2>
    <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5">
            <div class="card-body">
                <label class="form-label" for="image">Добавить фото</label>
                <input class="form-control" type="file" id="image" name="image" required accept="image/*">

                <label class="form-label mt-3" for="nameProduct">Название товара</label>
                <input class="form-control" type="text" id="nameProduct" name="nameProduct" required>

                <label class="form-label mt-3" for="id_category">Выбор категории</label>
                <select class="form-select" name="id_category" id="id_category">
                    @foreach ($categories as $a)
                        <option value="{{ $a->id_category }}">{{ $a->category_name }}</option>
                    @endforeach
                </select>

                <label class="form-label mt-3" for="descriptionProduct">Описание товара</label>
                <textarea class="form-control" rows="5" type="text" id="descriptionProduct" name="descriptionProduct" required></textarea>

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

    <h2 class="m-5 mb-0">Добавить категорию</h2>
    <form action="{{ route('addCategory') }}" method="post" >
        @csrf
        <div class="card p-2 m-5">
            <div class="card-body">
                <label for="nameCategory" class="form-label">Название категории</label>
                <input type="text" class="form-control" id="nameCategory" name="nameCategory" required>
            </div>
            <div class="ms-3 mt-0">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            <p>{{ session('messageAddCategory') }}</p>
        </div>
    </form>

    <h2 class="m-5 mb-0">Удалить категорию</h2>
    <form action="{{ route('dellCategory') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="card p-2 m-5">
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

    <h2 class="m-5 mb-0">Добавить статью</h2>
    <form action="{{ route('addArticles') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5" >
            <div class="card-body">
                <label class="form-label" for="image">Добавить фото</label>
                <input class="form-control" type="file" id="image" name="image" required accept="image/*">

                <label class="form-label mt-3" for="nameArticles">Название статьи</label>
                <input class="form-control" type="text" id="nameArticles" name="nameArticles" required>

                <label class="form-label mt-3" for="descriptionArticles">Описание статьи</label>
                <textarea class="form-control" rows="5" type="text" id="descriptionArticles" name="descriptionArticles" required></textarea>

                <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                <p>{{ session('messageAddArticles') }}</p>
            </div>
        </div>
    </form>

    <h2 class="m-5 mb-0">Удалить статью</h2>
    <form action="{{ route('dellArticles') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="card p-2 m-5">
            <div class="card-body">
                <select class="form-select" name="id_articles">
                    @foreach ($articles as $a)
                        <option value="{{ $a->id_articles }}">{{ $a->articles_name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-danger mt-3">Удалить</button>
                <p>{{ session('messageDellArticles') }}</p>
            </div>
        </div>
    </form>

<div class="container mt-4">
    <h2 class="m-4">Управление заказами</h2>

    @if(session('message'))
        <div class="alert alert-success m-4">{{ session('message') }}</div>
    @endif

    <div class="card m-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Сумма</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $a)
                    <tr>
                        <td>#{{ $a->id_order }}</td>
                        <td>{{ $a->name }} {{ $a->surname }}</td>
                        <td>{{ $a->order_sum }} ₽</td>
                        <td>
                            <form action="{{ route('admin.order.status', $a->id_order) }}" method="post">
                                @csrf
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    @foreach($status as $b)
                                        <option value="{{ $b->id_status }}" {{ $a->id_status == $b->id_status ? 'selected' : '' }}>
                                            {{ $b->status_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>{{ $a->created_at }}</td>
                        <td>
                            <form action="{{ route('dellOrder') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_order" value="{{ $a->id_order }}">
                                <button type="submit" class="btn btn-danger mt-3">Удалить</button>
                                <p>{{ session('messageDellOrder') }}</p>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
