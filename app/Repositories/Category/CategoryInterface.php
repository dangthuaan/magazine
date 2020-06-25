<?php

namespace App\Repositories\Category;

use App\Repositories\Base\BaseInterface;

interface CategoryInterface extends BaseInterface
{
    /**
     * Store new category.
     *
     * @param $data
     * @param bool $return_object
     * @return bool
     */
    public function new($data, $return_object = false);

    /**
     * Update new category.
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id, $data);
}
