@extends('admin::layouts.main')

@section('content')

    @include('admin::search.system-permissions')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">文章列表</h3>

                    <div class="btn-group pull-right">
                        <a href="{{ route('admin::articles.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                        </a>
                    </div>

                    @include('admin::widgets.filter-btn-group', ['resetUrl' => route('admin::permissions.index')])
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>分类</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>发布状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td>
                                    @if($article->status == 0)
                                        <form action="{{ route('admin::articles.publish', $article->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <button type="submit" class="btn btn-primary btn-sm" data-content="{{ $article->id }}">发布</button>
                                        </form>
                                        @else
                                        <button class="btn btn-primary btn-sm disabled">已发布</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin::articles.edit', $article->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-id="{{ $article->id }}" class="grid-row-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    {{ $articles->links('admin::widgets.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin::js.grid-row-delete', ['url' => route('admin::articles.index')])
@endsection