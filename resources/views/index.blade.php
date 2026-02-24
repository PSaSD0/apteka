@extends('layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide w-50 p-3">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="assets/img/logo.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="assets/img/logo.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="assets/img/logo.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
            <a href="{{ route("product") }}" class="btn btn-success">Купить</a>
        </div>
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
