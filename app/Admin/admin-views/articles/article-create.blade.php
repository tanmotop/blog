@extends('admin::layouts.main')

@section('css')
    <style>
        .CodeMirror{
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">创建</h3>
                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 10px">
                            <a href="{{ route('admin::articles.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;列表</a>
                        </div> <div class="btn-group pull-right" style="margin-right: 10px">
                            <a class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
                        </div>
                    </div>
                </div>
                <form id="post-form" class="form-horizontal" action="{{ route('admin::articles.store') }}" method="post" enctype="multipart/form-data" pjax-container>
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" id="title" name="title" value="" class="form-control" placeholder="输入 标题">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="covers" class="col-sm-2 control-label">Banner</label>
                                <div class="col-sm-8">
                                    <input type="file" class="banner" name="banner" id="banner" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="col-sm-2 control-label">分类</label>
                                <div class="col-sm-8">
                                    <select style="width: 100%;" name="category_id" id="category_id" tabindex="-1" data-placeholder="选择分类" class="form-control category_id select2-hidden-accessible">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags" class="col-sm-2 control-label">标签</label>
                                <div class="col-sm-8">
                                    <select style="width: 100%;" name="tags[]" id="tags" tabindex="-1" data-placeholder="选择标签" multiple class="form-control tags select2-hidden-accessible">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">摘要</label>
                                <div class="col-sm-8">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-sm-2 control-label">内容</label>
                                <div class="col-sm-8">
                                    <textarea name="content" id="content" cols="30" rows="10" hidden></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-sm-2 control-label">文章类型</label>
                                <div class="col-sm-8">
                                    <label for="square-radio-1" class=""><input type="radio" id="square-radio-1" class="type" name="type" value="0" checked>原创</label>
                                    &nbsp;
                                    <label for="square-radio-2" class=""><input type="radio" id="square-radio-2" class="type" name="type" value="1">转载</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="source" class="col-sm-2 control-label">来源</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" id="source" name="source" class="form-control" placeholder="输入 来源">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="btn-group pull-left">
                            <button type="reset" class="btn btn-warning">重置</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" id="submit-btn" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin'></i> 提交">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('.form-history-back').on('click', function (event) {
                event.preventDefault();
                history.back();
            });

            $(".category_id").select2({
                "allowClear": true
            });

            $(".tags").select2({
                "allowClear": true
            });

            $(".banner").fileinput({
                overwriteInitial: false,
                initialPreviewAsData: true,
                browseLabel: "浏览",
                showRemove: false,
                showUpload: false,
                allowedFileTypes: [
                    "image"
                ]
            });

            $('.type').iCheck({
                // checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });

            var simplemde = new SimpleMDE({
                element: $("#content")[0],
                // autosave: {
                //     enabled: true,
                //     uniqueId: "content",
                //     delay: 1000
                // },
                forceSync: true,
                toolbar: [
                    "bold",
                    "italic",
                    "heading-1",
                    "heading-2",
                    "heading-3",
                    "strikethrough",
                    "|",
                    "quote",
                    "unordered-list",
                    "ordered-list",
                    "code",
                    "horizontal-rule",
                    "|",
                    "link",
                    "image",
                    "table",
                    "|",
                    "preview",
                    "guide"
                ]
            });

            ///
            $("#post-form").bootstrapValidator({
                live: 'enable',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    title:{
                        validators:{
                            notEmpty:{
                                message: '请输入标题'
                            }
                        }
                    },
                    category:{
                        validators:{
                            notEmpty:{
                                message:'请选择分类'
                            }
                        }
                    }
                }
            });

            $("#submit-btn").click(function () {
                var $form = $("#post-form");

                $form.bootstrapValidator('validate');
                if ($form.data('bootstrapValidator').isValid()) {
                    $form.submit();
                }
            })
        });
    </script>
@endsection