@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-3">Новинки</h2>
        <div id="carouselExampleAutoplaying" class="carousel carousel-dark" data-bs-ride="carousel">
            <div class="carousel-inner rounded-5 shadow">
                @foreach($array as $a)
                    @if($loop->index==0)
                        <div class="carousel-item active">
                            <div class="row p-5 align-items-center">
                                <div class="col-md-5 text-center">
                                    <img src="{{ asset($a->image) }}" class="img-fluid rounded-3 ms-5" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                                </div>
                                <div class="col-md-7">
                                    <h6 class="text-primary text-dark ms-5">{{ $a->product_name }}</h6>
                                    <p class="card-text text-dark ms-5">{{ $a->category_name }}</p>
                                    <p class="card-text text-dark ms-5">{{ $a->price }} ₽</p>
                                    <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm me-2 mb-2 ms-5">Подробнее</a>
                                    <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm mb-2">В корзину</a><br>
                                    @auth
                                        @if(Auth::user()->id_role == 2)
                                            <a href="{{ route('editProductView',['id'=>$a->id_product]) }}" class="btn btn-outline-primary btn-sm mb-2 ms-5">Редактировать товар</a>

                                            <form action="{{ route('dellProduct') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id_product" value="{{ $a->id_product }}">
                                                <button type="submit" class="btn btn-danger btn-sm ms-5">Удалить</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <div class="row p-5 align-items-center">
                                <div class="col-md-5 text-center">
                                    <img src="{{ asset($a->image) }}" class="img-fluid rounded-3 ms-5" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                                </div>
                                <div class="col-md-7">
                                    <h6 class="text-primary text-dark ms-5">{{ $a->product_name }}</h6>
                                    <p class="card-text text-dark ms-5">{{ $a->category_name }}</p>
                                    <p class="card-text text-dark ms-5">{{ $a->price }} ₽</p>
                                    <a href="{{ route('product', $a->id_product) }}" class="btn btn-outline-primary btn-sm me-2 mb-2 ms-5">Подробнее</a>
                                    <a href="{{ route('basket', $a->id_product) }}" class="btn btn-success btn-sm mb-2">В корзину</a><br>
                                    @auth
                                        @if(Auth::user()->id_role == 2)
                                            <a href="{{ route('editProductView',['id'=>$a->id_product]) }}" class="btn btn-outline-primary btn-sm mb-2 ms-5">Редактировать товар</a>

                                            <form action="{{ route('dellProduct') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id_product" value="{{ $a->id_product }}">
                                                <button type="submit" class="btn btn-danger btn-sm ms-5">Удалить</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
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

    <div class="d-flex justify-content-between mt-5">
        <h2>Статьи</h2>
        <a href="{{ route("articles") }}" class="btn btn-outline-primary mb-3">Все статьи</a>
    </div>
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
                                    <h6 class="card-title text-dark">{{ $a->articles_name }}</h6>
                                    <p class="card-text text-dark"><small class="text-body-secondary">{{ $a->created_at }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
