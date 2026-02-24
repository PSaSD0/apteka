@extends('layouts.app')

@section('content')
    <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide w-50 p-3" data-bs-ride="carousel">
        <h1 class="m-5">Новинки</h1>
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

    <h2>Спецпредложения</h2>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btnradio1">Популярные товары</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-success" for="btnradio2">Набором дешевле</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-success" for="btnradio3">Скидки</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
        <label class="btn btn-outline-success" for="btnradio4">До -50%</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
        <label class="btn btn-outline-success" for="btnradio5">Новинки</label>
    </div>

    <div class="card mt-4" style="width: 18rem;">
        <img src="assets/img/vitamin c.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Bonbonc Витамин С со вкусом апельсина пастилки для детей с 3 лет 60 шт</h5>
            <p class="card-text">759 ₽</p>
            {{-- <a href="{{ route('product', parameters: $a->id_product) }}" class="btn btn-success">Купить</a> --}}
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route("catalog") }}" class="btn btn-success">Все товары</a>
    </div>

    <h2>Статьи</h2>
    <div class="d-flex flex-row gap-3">
        <div class=" m-0 mb-5 container p-0" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/img/stat.webp" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-0 ps-3">
                        <p class="card-text">5 Способов защиты питомцев от клещей</p>
                        <p class="card-text"><small class="text-body-secondary">06 Марта 2023</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class=" m-0 mb-5 container p-0" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/img/stat.webp" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-0 ps-3">
                        <p class="card-text">5 Способов защиты питомцев от клещей</p>
                        <p class="card-text"><small class="text-body-secondary">06 Марта 2023</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class=" m-0 mb-5 container p-0" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/img/stat.webp" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-0 ps-3">
                        <p class="card-text">5 Способов защиты питомцев от клещей</p>
                        <p class="card-text"><small class="text-body-secondary">06 Марта 2023</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class=" m-0 mb-5 container p-0" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/img/stat.webp" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body p-0 ps-3">
                        <p class="card-text">5 Способов защиты питомцев от клещей</p>
                        <p class="card-text"><small class="text-body-secondary">06 Марта 2023</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
