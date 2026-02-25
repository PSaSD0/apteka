@extends('layouts.app')

@section('content')
    <h2 class="m-5">Новинки</h2>
    <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide w-50 p-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($array as $a)
                @if($loop->index==0)
                    <div class="carousel-item active">
                        <img src="{{ asset($a->image) }}" class="d-block w-10 mx-auto p-2" style="max-height: 300px; width: auto; max-width: 100%; object-fit: contain;">
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{ asset($a->image) }}" class="d-block w-10 mx-auto p-2" style="max-height: 300px; width: auto; max-width: 100%; object-fit: contain;">
                    </div>
                @endif
            @endforeach
        </div>
        <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h2 class="mt-4">Популярные товары</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($productPopylar as $a)
            <div class="col">
                <div class="card h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 d-flex align-items-center p-2">
                            <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-bold">{{ $a->product_name }}</p>
                                <p class="card-text">{{ $a->price }} ₽</p>
                                <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                                <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm">В корзину</a>
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
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-4">Товары дня</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($productDay as $a)
            <div class="col">
                <div class="card h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 d-flex align-items-center p-2">
                            <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-bold">{{ $a->product_name }}</p>
                                <p class="card-text">{{ $a->price }} ₽</p>
                                <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                                <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm">В корзину</a>
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
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-4">Специально для вас</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($productSpecial as $a)
            <div class="col">
                <div class="card h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 d-flex align-items-center p-2">
                            <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-bold">{{ $a->product_name }}</p>
                                <p class="card-text">{{ $a->price }} ₽</p>
                                <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                                <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm">В корзину</a>
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
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="mt-4">Новинки</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($productNew as $a)
            <div class="col">
                <div class="card h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 d-flex align-items-center p-2">
                            <img src="{{ asset($a->image) }}" class="img-fluid" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-bold">{{ $a->product_name }}</p>
                                <p class="card-text">{{ $a->price }} ₽</p>
                                <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                                <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm">В корзину</a>
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
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route("catalog") }}" class="btn btn-success">Все товары</a>
    </div>

    <h2>Статьи</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($articles as $a)
            <div class="col">
                <a class="text-decoration-none" href="{{ route('articlesOne', $a->id_articles) }}">
                    <div class="card h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 d-flex align-items-center p-2">
                                <img src="{{ asset($a->image) }}" class="img-fluid rounded-3" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-title fw-bold text-dark">{{ $a->articles_name }}</p>
                                    <p class="card-text text-dark"><small class="text-body-secondary">{{ $a->created_at }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route("articles") }}" class="btn btn-success">Все статьи</a>
    </div>
@endsection
