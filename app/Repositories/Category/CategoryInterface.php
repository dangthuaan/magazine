<?php

namespace App\Repositories\Category;

use App\Repositories\Base\BaseInterface;

interface CategoryInterface extends BaseInterface
{
    /**
     * Store new category.
     *
     * @param $data
     * @return bool
     */
    public function new($data);

    /**
     * Update new category.
     *
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id, $data);
}
