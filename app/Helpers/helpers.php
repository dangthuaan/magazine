<?php

use Illuminate\Support\Carbon;

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

if (!function_exists('getPostCover')) {
    function getPostCover($id, $image)
    {
        $imagePath = '/storage/images/post/cover/no_cover.jpg';

        if ($image) {
            $imagePath = asset('/storage/images/post/cover/' . $id . '/' . $image);
        }

        return $imagePath;
    }
}

if (!function_exists('getCreatedFromTime')) {
    function getCreatedFromTime($post)
    {
        return Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans();
    }
}

if (!function_exists('getCheckNew')) {
    function isNew($time)
    {
        $time = Carbon::createFromTimeString($time);
        return $time->addHours(72) >= now();
    }
}

if (!function_exists('getTranslatedDate')) {
    function getTranslatedDate($time)
    {
        return Carbon::createFromTimeString($time)->translatedFormat('j F, Y');
    }
}
