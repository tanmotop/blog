<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2018/8/18
 * Time: 11:19
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
use App\Models\Tag;
use Illuminate\Http\Request;

/**
 * @module 标签管理
 *
 * Class TagController
 * @package App\Admin\Controllers
 */
class TagController extends Controller
{
    /**
     * @permission 标签列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);

        return view('admin::tags.tags', compact('tags'));
    }

    /**
     * @permission 创建标签
     */
    public function create()
    {
        return view('admin::tags.tag-create');
    }

    /**
     * @permission 保存标签
     */
    public function store()
    {
        $tag = new Tag();
        $tag->name = request()->get('name');
        $tag->save();

        return redirect()->route('admin::tags.index');
    }

    /**
     * @permission 编辑标签
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        return view('admin::tags.tag-edit', compact('tag'));
    }

    /**
     * @permission 更新标签
     *
     * @param Tag $tag
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Tag $tag, Request $request)
    {
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('admin::tags.index');
    }

    /**
     * @permission 删除标签
     *
     * @param Tag $tag
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();

        return response()->json(['status' => 1, 'message' => '成功']);
    }
}