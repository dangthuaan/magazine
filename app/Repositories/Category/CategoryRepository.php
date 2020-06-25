<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * Store new category.
     *
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function new($data, $return_object = false)
    {
        if ($data['parent_id'] === 'null') {
            $data['parent_id'] = null;
        }

        try {
            $newCategory = $this->create($data);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return $return_object ? $newCategory : true;
    }

    /**
     * Update category.
     *
     * @param $id
     * @param $data
     * @return bool
     *
     */
    public function edit($id, $data)
    {
        if ($data['parent_id'] === 'null') {
            unset($data['parent_id']);
        }

        try {
            $this->update($id, $data);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Destroy category.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        try {
            $this->delete($id);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
