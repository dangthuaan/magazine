<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @var Model Category
     */
    protected $category;

    /**
     * Register Category Constructor
     *
     * @param CategoryInterface $category
     */
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function list()
    {
        $categories = $this->category->all(['childs']);

        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Store new category.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $newCategory = $this->category->new($request->only('name', 'parent_id', 'description'), true);

        if (!$newCategory) {
            return response()->json([
                'status' => false
            ]);
        }

        if (is_null($newCategory->parent_id)) {
            $html = view('admin.categories.parent', ['category' => $newCategory])->render();
        } else {
            $html = view('admin.categories.child', ['category' => $newCategory])->render();
        }

        return response()->json([
            'status' => true,
            'html' => $html,
            'parentId' => $newCategory->parent_id
        ]);
    }

    /**
     * Display specific category.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id)
    {
        $category = $this->category->find($id);

        $parentCategories = $this->category->findAll(null, '=', 'parent_id');

        if (!$category) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $category,
            'categories' => $parentCategories
        ]);
    }

    /**
     * Update specific category.
     *
     * @param CategoryRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $update = $this->category->edit($id, $request->only('name', 'parent_id', 'description'));

        $categories = $this->category->all(['childs']);

        return response()->json([
            'status' => $update,
            'html' => view('admin.categories.body', compact('categories'))->render()
        ]);
    }

    /**
     * Remove specific category.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $remove = $this->category->destroy($id);

        return response()->json([
            'status' => $remove
        ]);
    }
}
