@extends('layouts.blog')

@section('content')
    <div class="col-md-12">
        <div class="list-group">
            @foreach($tags as $tag)
                <a href="{{ route('tags.show', $tag->id) }}" class="list-group-item list-group-item-action">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
@endsection