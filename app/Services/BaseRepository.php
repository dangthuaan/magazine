<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\BaseInterface;
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
     * Create new resource.
     *
     * @param Array $data
     * @return Response
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a specific resource.
     *
     * @param Int $id
     * @param String $attribute
     * @param Array $data
     * @return Response
     */
    public function update($id, $attribute = 'id', $data)
    {
        return $this->model->where($attribute, '=', $id)->update($data);
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
}
