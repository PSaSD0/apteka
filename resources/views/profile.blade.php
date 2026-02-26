@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Заказы</h2>
    <form action="{{ route('profile') }}" method="get">
        <div class="d-flex justify-content-start" >
            @csrf
            <select class="form-select m-5  ms-0" style="width: 250px;" name="filter">
                <option value="new" {{ request('filter') == 'new' ? 'selected' : '' }}>Новые</option>
                <option value="old" {{ request('filter') == 'old' ? 'selected' : '' }}>Старые</option>
            </select>

            <button type="submit" class="btn btn-primary m-5">Отфильтровать</button>
        </div>
    </form>

    <div class="m-5 mt-0">
        @foreach($array as $a)
            <div class="card mb-3">
                <div class="card-body">
                    <p>Заказ: {{ $a->id_order }} от {{ $a->created_at }}</p>
                    <p>Сумма: {{ $a->order_sum }} ₽</p>
                    <p>Статус:
                        @if($a->id_status == 1)
                            <span class="">Новый</span>
                        @elseif($a->id_status == 2)
                            <span class="">В обработке</span>
                        @elseif($a->id_status == 3)
                            <span class="">Выполнен</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выйти из профиля') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>
@endsection
