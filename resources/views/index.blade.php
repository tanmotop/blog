@extends('layouts.blog')

@section('content')

    <div class="col-md-8">
        @foreach($articles as $article)
        <article class="card mb-4 box-shadow">
            <div class="post-header">
                <h3>{{ $article->title }}</h3>
            </div>

            <div class="card-body">
                <img alt="" style="height: 300px; width: 100%; display: block;" src="{{ $article->banner }}" data-holder-rendered="true">
                <p class="card-text">
                    {{ $article->description }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('articles.show', [$article->id, $article->slug]) }}" class="btn btn-sm btn-outline-secondary">阅读全文</a>
                    <small class="text-muted">
                        <i class="far fa-calendar"></i> {{ optional($article->created_at)->toDateString() }}
                        |
                        {{--<i class="far fa-comments fa-fw"></i> 2--}}
                        {{--|--}}
                        <i class="far fa-folder"></i> <a href="{{ route('categories.show', $article->category_id) }}">{{ $article->category->title }}</a>
                    </small>
                </div>
            </div>
            <div class="post-footer">
                <div class="pull-left">
                    <i class="fa fa-tags"></i>
                    @foreach($article->tags as $tag)
                    <a class="mr-2" href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </article>
        @endforeach

        <nav aria-label="Page navigation example">
            {{ $articles->links('layouts.pagination') }}
        </nav>

    </div>

    @include('aside')

@endsection