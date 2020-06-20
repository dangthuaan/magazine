<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base Constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all resources.
     *
     * @return Collection|Model[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a resource.
     *
     * @param string $attribute
     * @return Collection|Model[]
     */
    public function find($data, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $data)->first();
    }

    /**
     * Find a resource.
     *
     * @param $data
     * @param string $attribute
     * @return Collection|Model[]
     */
    public function findAll($data, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $data)->get();
    }

    /**
     * Create new resource.
     *
     * @param array $data
     * @return Response
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a specific resource.
     *
     * @param int $id
     * @param string $attribute
     * @param array $data
     * @return Response
     */
    public function update($id, $data, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * Update resources.
     *
     * @param $ids
     * @param array $data
     * @param String $attribute
     * @return Response
     */
    public function updateMany($ids, $data, $attribute = 'id')
    {
        return $this->model->whereIn($attribute, $ids)->update($data);
    }

    /**
     * Delete a specific resource.
     *
     * @param $id
     * @return Boolean
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Store a session.
     *
     * @param $request
     * @param $key
     * @param $value
     * @return Boolean
     */
    public function session($request, $key, $value)
    {
        return $request->session()->put($key, $value);
    }

    /**
     * List all resources with specific order and pagination.
     *
     * @param $order
     * @param $pages
     * @return Response
     */
    public function list($order, $pages)
    {
        if ($order === 'desc') {
            return $this->model->orderByDesc()->paginate($pages);

        } elseif ($order === 'asc') {
            return $this->model->orderByAsc()->paginate($pages);

        } else {
            return false;
        }
    }

    /**
     * Search.
     *
     * @param $string
     * @param $columns
     * @return void
     */
    public function search($string, $columns)
    {
        return $this->model->where(function ($query) use ($columns, $string) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $string . '%');
            }
        })->get();
    }
}
