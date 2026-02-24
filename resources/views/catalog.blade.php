@extends('layouts.app')

@section('content')
    <h1 class="m-5">Каталог</h1>
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

     @foreach ($array as $a)
        <form style="width: auto", action="{{ route( 'product', ['id'=>$a->id_product]) }}">
            @csrf
            <div class="container d-grid">
                <div class="row mb-3 gap-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $a->image }}" class="card-img-top" alt="принтер">
                        <div class="card-body">
                            <h5 class="card-title fs-3">{{$a->product_name}}</h5>
                            <p class="card-text fs-5">{{$a->product_description}}</p>
                            <p class="card-text fs-4">{{$a->price}}$</p>
                            <button type="submit" class="btn btn-primary fs-5">К товару</button>
                            {{-- <a href="{{ route('basket', parameters: $a->id_product) }}" class="btn btn-success fs-5">В корзину</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
     @endforeach

@endsection
