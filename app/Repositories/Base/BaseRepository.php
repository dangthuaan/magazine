<?php

namespace App\Repositories\Base;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class BaseRepository implements BaseInterface
{
    protected $relations = [];

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
     * @param array $relations
     * @return Collection|Model[]
     */
    public function all($relations = [])
    {
        if ($this->model instanceof Builder) {
            return $this->model->get();
        } else {
            return $this->model->all();
        }
    }

    /**
     * Find a resource.
     *
     * @param $data
     * @param string $operator
     * @param string $attribute
     * @return Collection|Model[]
     */
    public function find($data, $operator = '=', $attribute = 'id')
    {
        return $this->model->where($attribute, $operator, $data)->first();
    }

    /**
     * Find a resource with eager relations.
     *
     * @param $relations
     * @param $data
     * @param string $attribute
     * @return Builder|Model|object
     */
    public function findWith($relations, $data, $attribute = 'id')
    {
        return $this->model->with($relations)->where($attribute, '=', $data)->first();
    }

    /**
     * Find all resource.
     *
     * @param $data
     * @param string $operator
     * @param string $attribute
     * @return Collection|Model[]
     */
    public function findAll($data, $operator = '=', $attribute = 'id')
    {
        return $this->model->where($attribute, $operator, $data)->get();
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
     * @param $relations
     * @param $order
     * @param $pages
     * @return LengthAwarePaginator
     */
    public function list($relations, $order, $pages)
    {
        if ($order === 'desc') {
            return $this->model->with($relations)->orderByDesc()->paginate($pages);

        } elseif ($order === 'asc') {
            return $this->model->with($relations)->orderByAsc()->paginate($pages);

        } else {
            return false;
        }
    }

    /**
     * Search.
     *
     * @param $string
     * @param $columns
     * @param array $relations
     * @return void
     */
    public function search($string, $columns, $relations = [])
    {
        return $this->model->where(function ($query) use ($columns, $string) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $string . '%');
            }
        })->orWhere(function ($query) use ($relations, $string) {
            foreach ($relations as $relation) {
                $query->whereHas($relation, function ($subQuery) use ($relation, $string) {
                    $subQuery->where('name', 'LIKE', '%' . $string . '%');
                });
            }
        })->get();
    }

    /**
     * Store a file in disk.
     *
     * @param $userId
     * @param $file
     * @param $disk
     * @return string
     */
    public function file($userId, $file, $disk)
    {
        $fileName = $userId . '_' . $file->getClientOriginalName();

        $storeFile = $file->storeAs('/' . $userId, $fileName, $disk);

        if (!$storeFile) {
            return false;
        }

        return $fileName;
    }
}
