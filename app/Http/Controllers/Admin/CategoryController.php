<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
        $categories = $this->category->all();

        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Store new category.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $storeCategory = $this->category->new($request->only('name', 'parent_id', 'description'));

        if (!$storeCategory) {
            return back()->with('error', 'Something went wrong!');
        }

        return back()->with('success', 'Success! New Category has been created.');
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

        $parentCategories = $this->category->findAll(null, 'parent_id');

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

        return response()->json([
            'status' => $update
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
