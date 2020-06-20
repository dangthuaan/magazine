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
     * @return bool
     */
    public function new($data)
    {
        if ($data['parent_id'] === 'null') {
            $data['parent_id'] = null;
        }

        try {
            $this->create($data);
        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
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
        try {
            $this->update($id, $data);

        } catch (Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Update category.
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
