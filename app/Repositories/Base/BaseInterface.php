<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

interface BaseInterface
{
    /**
     * Get all resources.
     *
     * @return Response
     */
    public function all();

    /**
     * Find a resource.
     *
     * @param $data
     * @param string $operator
     * @param string $attribute
     * @return Collection|Model[]
     */
    public function find($data, $operator = '=', $attribute = 'id');

    /**
     * Find a resource with eager relations.
     *
     * @param $relations
     * @param $data
     * @param string $attribute
     * @return Builder|Model|object
     */
    public function findWith($relations, $data, $attribute = 'id');

    /**
     * Find all resource.
     *
     * @param $data
     * @param string $operator
     * @param string $attribute
     * @return Collection|Model[]
     */
    public function findAll($data, $operator = '=', $attribute = 'id');

    /**
     * Create new resource.
     *
     * @param array $data
     * @return Response
     */
    public function create($data);

    /**
     * Update a specific resource.
     *
     * @param Int $id
     * @param String $attribute
     * @param array $data
     * @return Response
     */
    public function update($id, $data, $attribute = 'id');

    /**
     * Update resources.
     *
     * @param $ids
     * @param array $data
     * @param String $attribute
     * @return Response
     */
    public function updateMany($ids, $data, $attribute = 'id');

    /**
     * Delete a specific resource.
     *
     * @param Int $id
     * @return Boolean
     */
    public function delete($id);

    /**
     * Store a session.
     *
     * @param $request
     * @param $key
     * @param $value
     * @return Boolean
     */
    public function session($request, $key, $value);

    /**
     * List all resources with specific order and pagination.
     *
     * @param $relations
     * @param $order
     * @param $pages
     * @return Response
     */
    public function list($relations, $order, $pages);

    /**
     * Search.
     *
     * @param $string
     * @param $columns
     * @param array $relations
     * @return void
     */
    public function search($string, $columns, $relations = []);

    /**
     * Store a file in disk.
     *
     * @param $userId
     * @param $file
     * @param $disk
     * @return string
     */
    public function file($userId, $file, $disk);
}
