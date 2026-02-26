@extends('layouts.app')

@section('content')
    <h2 class="m-5">Статьи</h2>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($array as $a)
                <div class="col">
                    <a class="text-decoration-none" href="{{ route('articlesOne', $a->id_articles) }}">
                        <div class="card h-100">
                            <div class="text-center p-3" style="height: 220px;">
                                <img src="{{ asset($a->image) }}" class="img-fluid rounded-3" style="max-height: 100%; width: auto; max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title text-dark">{{ $a->articles_name }}</h5>
                                <p class="card-text text-dark">{{ $a->created_at }}</p>
                                <a href="{{ route('articlesOne', $a->id_articles) }}" class="btn btn-outline-primary btn-sm mt-4">Читать</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
