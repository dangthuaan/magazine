<?php

namespace App\Contracts;

use Illuminate\Http\Response;

interface UserInterface extends BaseInterface
{
    /**
     * Register.
     *
     * @param array $data
     * @return Response
     */
    public function register($data);

    /**
     * Register.
     *
     * @param $credentials
     * @return Boolean
     */
    public function authenticate($credentials);
}
