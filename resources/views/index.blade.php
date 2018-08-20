@extends('layouts.blog')

@section('content')

    <div class="col-md-8">
        <article class="card mb-4 box-shadow">
            <div class="post-header">
                <h3>Open Images V4 </h3>
            </div>

            <div class="card-body">
                <img alt="Thumbnail [100%x225]" style="height: 300px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16536370ad1%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16536370ad1%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22113.5%22%20y%3D%22120.6%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                <p class="card-text">
                    这里是一大段的摘要
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-sm btn-outline-secondary">阅读全文</button>
                    <small class="text-muted">
                        <i class="far fa-calendar"></i> 2018-08-14
                        |
                        <i class="far fa-comments fa-fw"></i> 2
                        |
                        <i class="far fa-folder"></i> PHP
                    </small>
                </div>
            </div>
            <div class="post-footer">
                <div class="pull-left">
                    <i class="fa fa-tags"></i>
                    <a class="mr-2" href="#">资源</a>
                    <a class="mr-2" href="#">Deep Learning</a>
                    <a class="mr-2" href="#">数据集</a>
                </div>
            </div>
        </article>
    </div>

    @include('aside')

@endsection