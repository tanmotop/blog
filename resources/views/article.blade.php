@extends('layouts.blog')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="post-header">
                <h3>{{ $article->title }}</h3>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="far fa-calendar"></i> {{ optional($article->created_at)->toDateString() }}
                        |
                        <i class="far fa-comments fa-fw"></i> 2
                        |
                        <i class="far fa-folder"></i> {{ $article->category->title }}
                    </small>
                </div>
            </div>

            <div class="card-body">
                <img alt="" style="width: 100%;" src="{{ $article->banner }}" data-holder-rendered="true">

                <div class="markdown">
                    {!! $article->html_content !!}
                </div>

                <div class="post-info-panel">
                    <p class="info">
                        @if($article->type == 0)
                            <label class="info-title">版权声明：</label><i class="fab fa-fw fa-creative-commons"></i>自由转载-非商用-非衍生-保持署名（<a href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）
                        @else
                            <label class="info-title">文章来源：</label>{{ $article->source }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="post-footer">
                <i class="fa fa-tags"></i>
                @foreach($article->tags as $tag)
                <a class="mr-2" href="{{ route('tags.index', $tag->id) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    @include('aside')
@endsection