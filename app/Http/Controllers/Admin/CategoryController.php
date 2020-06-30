<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Throwable;

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
     * @throws AuthorizationException
     */
    public function list()
    {
        $this->authorize('view', Category::class);

        $categories = $this->category->all(['childs']);

        return view('admin.categories.list', compact('categories'));
    }

    /**
     * New Category Form.
     *
     * @return JsonResponse
     * @throws AuthorizationException|Throwable
     */
    public function form()
    {
        $this->authorize('create', Category::class);

        $categories = $this->category->all(['childs']);

        if (!$categories) {
            return response()->json([
                'status' => false
            ]);
        }

        return response()->json([
            'status' => true,
            'html' => view('admin.categories.modals.create_body', compact('categories'))->render()
        ]);
    }

    /**
     * Store new category.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);

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
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('view', Category::class);

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
     * @throws AuthorizationException
     * @throws Throwable
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('update', Category::class);

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
     * @throws AuthorizationException
     * @throws Throwable
     */
    public function destroy($id)
    {
        $this->authorize('delete', Category::class);

        $remove = $this->category->destroy($id);

        $categories = $this->category->all(['childs']);

        return response()->json([
            'status' => $remove,
            'html' => view('admin.categories.body', compact('categories'))->render()
        ]);
    }
}
