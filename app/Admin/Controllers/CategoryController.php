<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2018/8/18
 * Time: 11:18
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
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @module 分类管理
 * Class CategoryController
 * @package App\Admin\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @permission 分类列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin::categories.categories', compact('categories'));
    }

    /**
     * @permission 创建分类
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin::categories.category-create');
    }

    /**
     * @permission 保存分类
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('banner', 'public');
            $category->banner = $path;
        }

        $category->save();

        return redirect()->route('admin::categories.index');
    }

    /**
     * @permission 编辑分类
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin::categories.category-edit', compact('category'));
    }

    /**
     * @permission 更新分类
     *
     * @param Category $category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category, Request $request)
    {
        $category->title = $request->title;
        $category->description = $request->description;

        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('banner', 'public');
            $category->banner = $path;
        }

        $category->save();

        return redirect()->route('admin::categories.index');
    }

    /**
     * @permission 删除分类
     *
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if ($category->articles()->count() > 0) {
            return response()->json(['status' => 0, 'message' => '该栏目不为空']);
        }

        $category->delete();
        return response()->json(['status' => 1, 'message' => '成功']);
    }
}