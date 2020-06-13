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
     * Create new resource.
     *
     * @param Array $data
     * @return Response
     */
    public function create($data);

    /**
     * Update a specific resource.
     *
     * @param Int $id
     * @param String $attribute
     * @param Array $data
     * @return Response
     */
    public function update($id, $attribute = 'id', $data);

    /**
     * Delete a specific resource.
     *
     * @param Int $id
     * @return Boolean
     */
    public function delete($id);
}
