@extends('layouts.app')

@section('content')
    <div class="card mb-3 m-5" style="w-10">
        <div class="row g-0">
            <div class="col-md-4 p-3">
                <img src="{{ asset(path: $array->image) }}" class="img-fluid rounded-3" alt="...">
            </div>
            <div class="col-md-8">

                <div class="card-body">
                    <h5 class="card-title">{{ $array->articles_name }}</h5><br>
                    <p class="card-text">{{ $array->articles_description }}</p>
                </div>
            </div>
        </div>
    </div>
=@endsection
