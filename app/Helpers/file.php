<?php
if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/images/default.jpg';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
