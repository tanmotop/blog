@extends('layouts.blog')

@section('content')
    @foreach($categories as $category)
    <div class="col col-md-4">
        <div class="card text-center mb-4">
            <img class="card-img-top" src="{{ $category->banner }}" height="225" alt="">

            <div class="card-body">
                <h4 class="card-title">
                    <a class="text-dark" href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
                </h4>
                <p class="card-text">{{ $category->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
@endsection