<?php

namespace App\Contracts;

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
     * @param string $attribute
     * @return Response
     */
    public function find($data, $attribute = 'id');

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
}
