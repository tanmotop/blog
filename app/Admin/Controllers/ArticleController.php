<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2018/8/18
 * Time: 10:43
 *
 *                                _oo8oo_
 *                               o8888888o
 *                               88" . "88
 *                               (| -_- |)
 *                               0\  =  /0
 *                             ___/'==='\___
 *                           .' \\|     |// '.
 *                          / \\|||  :  |||// \
 *                         / _||||| -:- |||||_ \
 *                        |   | \\\  -  /// |   |
 *                        | \_|  ''\---/''  |_/ |
 *                        \  .-\__  '-'  __/-.  /
 *                      ___'. .'  /--.--\  '. .'___
 *                   ."" '<  '.___\_<|>_/___.'  >' "".
 *                  | | :  `- \`.:`\ _ /`:.`/ -`  : | |
 *                  \  \ `-.   \_ __\ /__ _/   .-` /  /
 *              =====`-.____`.___ \_____/ ___.`____.-`=====
 *                                `=---=`
 *
 *
 *             ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *                         佛祖保佑    永无BUG
 *
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Jourdon\Slug\Slug;

/**
 * @module 文章管理
 *
 * Class ArticleController
 * @package App\Admin\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @var \ParsedownExtra
     */
    private $parsedownExtra;

    /**
     * ArticleController constructor.
     * @param \ParsedownExtra $parsedownExtra
     */
    public function __construct(\ParsedownExtra $parsedownExtra)
    {
        $this->parsedownExtra = $parsedownExtra;
    }

    /**
     * @permission 文章列表
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin::articles.articles', compact('articles'));
    }

    /**
     * @permission 文章详情
     */
    public function show()
    {

    }

    /**
     * @permission 新建文章
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin::articles.article-create', compact('categories', 'tags'));
    }

    /**
     * @permission 保存文章
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->type = $request->type;
        $article->slug = Slug::translate($request->title);
        $article->content = $request->content;
        $article->html_content = $this->parsedownExtra->text($request->content);
        $article->source = $request->source;

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('banner', 'public');
            $article->banner = $path;
        }

        $category->articles()->save($article);
        $article->tags()->sync($request->tags);

        return redirect()->route('admin::articles.index');
    }

    /**
     * @permission 编辑文章
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin::articles.article-edit', compact('article', 'categories', 'tags'));
    }

    /**
     * @permission 保存修改
     *
     * @param Article $article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Article $article, Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->type = $request->type;
        $article->slug = Slug::translate($request->title);
        $article->content = $request->content;
        $article->html_content = $this->parsedownExtra->text($request->content);
        $article->source = $request->source;

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('banner', 'public');
            $article->banner = $path;
        }

        $category->articles()->save($article);
        $article->tags()->sync($request->tags);

        return redirect()->route('admin::articles.index');
    }

    /**
     * @permission 删除文章
     * 
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return response()->json(['status' => 1, 'message' => '成功']);
    }
}