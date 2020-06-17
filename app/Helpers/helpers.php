<?php

if (!function_exists('getUserAvatar')) {
    function getUserAvatar($id, $image)
    {
        $imagePath = '/storage/images/user/default.jpg';

        if ($image) {
            $imagePath = asset('/storage/images/avatar/' . $id . '/' . $image);
        }

        return $imagePath;
    }
}
