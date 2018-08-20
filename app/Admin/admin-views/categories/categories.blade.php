@extends('admin::layouts.main')

@section('content')

    @include('admin::search.system-permissions')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">分类列表</h3>

                    <div class="btn-group pull-right">
                        <a href="{{ route('admin::categories.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                        </a>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>Banner</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <img src="{{ $category->banner }}" width="150" height="80"  alt="Banner">
                                </td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('admin::categories.edit', $category->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-id="{{ $category->id }}" class="grid-row-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    {{ $categories->links('admin::widgets.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin::js.grid-row-delete', ['url' => route('admin::categories.index')])
@endsection