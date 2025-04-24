<?php

if (!function_exists('getImage')) {
    function getImage($imagePath = null) {
        // Check if image exists; if not, return default image
        return $imagePath && file_exists(public_path($imagePath))
            ? asset($imagePath)
            : asset('default.png'); // Default Image
    }

    function getYouTubeVideoId($url) {
        preg_match("/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/", $url, $matches);
        return $matches[1] ?? null;
    }

}

