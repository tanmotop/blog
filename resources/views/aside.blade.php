<aside class="col-md-4">
    <div class="card card-user mb-4" style="overflow: hidden">
        <div class="card-user-header bg-placeholder">
            <h3 class="card-user-username">黑将军(Tanmo)</h3>
            <h5 class="card-user-desc">
                日拱一卒 功不唐捐
            </h5>
        </div>
        <div class="card-user-image">
            <img class="rounded-circle"
                 src="https://s.gravatar.com/avatar/0f6ca7bedec717ef39d41f85d99ed0f0?s=80&r=g"
                 alt="User Avatar">
        </div>
        <div class="card-user-footer">
            <div class="row">
                <div class="col">
                    <div class="description-block">
                        <a href="https://github.com/tanmotop"
                           target="_blank" title="Github"
                           class="description-header text-muted">
                            <i class="fab fa-github fa-lg fa-fw"></i>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="description-block">
                        <a href="https://weibo.com/u/2077381483"
                           target="_blank" title="Weibo"
                           class="description-header text-muted">
                            <i class="fab fa-weibo fa-lg fa-fw"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="aside-header">
            <h4>分类</h4>
        </div>

        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($categories as $category)
                <li><a href="{{ route('categories', $category->id) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>