@extends('layouts.app')

@section('content')
    <h1 class="m-5">Заказы:</h1>
    <select class="form-select m-5" aria-label="Default select example" style="width: 250px;">
        <option value="1">Новый</option>
        <option value="2">Старый</option>
    </select>

    <div class="container m-5">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Количество товаров</th>
                    <th scope="col">Товары</th>
                    <th scope="col">Время заказа</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Подтвержденный</td>
                        <td>1 товар</td>
                        <td>принтер</td>
                        <td>04:20:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
