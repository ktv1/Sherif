<?php
use App\Library\GetFunction;
use Illuminate\Support\Facades\Storage;
/**
* Get image url
*
* @param img relative path
* @return img url
*/
if (!function_exists('get_image_cache')) {
    function get_image_cache($img_path, $w, $h)
    {
        return GetFunction::create_image_url_cache($img_path, $w, $h);
    }
}

if (!function_exists('get_download_image_cache')) {
    function get_download_image_cache($img_path, $w, $h)
    {
        return GetFunction::create_download_image_url_cache($img_path, $w, $h);
    }
}
if (!function_exists('get_url_image')) {
    function get_url_image($img_path, $w, $h)
    {

        return Storage::url(GetFunction::create_image_url_cache($img_path, $w, $h));
    }
}
if (!function_exists('set_image_cache')) {
    function set_image_cache($img_path, $type)
    {
        return GetFunction::set_image_url_cache($img_path, $type);
    }
}

if (!function_exists('get_file_path')) {
    function get_file_path($img_path)
    {
        return GetFunction::get_file_path($img_path);
    }
}

if (!function_exists('platformSlashes')) {
    function platformSlashes($path)
    {
        return str_replace(DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, str_replace('/', DIRECTORY_SEPARATOR, $path));
    }
}

if (!function_exists('generate_filename')) {
    /* Generate Unique filename */
    function generate_filename($dir, $ext)
    {
        do {
            $name = str_random(10).'.'.$ext;
        } while (file_exists($dir.$name));

        return $name;
    }
}

if(!function_exists('roundFinalPrice')) {
    /* round final prices*/
    function roundFinalPrice($price)
    {
        return GetFunction::roundFinalPrice($price);
    }
}