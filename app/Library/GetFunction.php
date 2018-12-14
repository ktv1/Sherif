<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 30.07.2018
 * Time: 16:17
 */

namespace App\Library;

use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GetFunction
{
    public static function create_image_url_cache($filepath, $w, $h) {
        //print_r($filepath);
        $old_image = $filepath;
        $filepath = get_file_path($filepath);
        if (!is_file($filepath)) {
            return ('/storage/placeholder.png');
        }

        $extension = pathinfo($filepath, PATHINFO_EXTENSION);


        $new_image = 'cache' .'/' . mb_substr(($old_image), 0, mb_strrpos(($old_image), '.')) . '-' . $w . 'x' . $h . '.' . $extension;

       // dd(get_file_path($new_image));
        if (!is_file(get_file_path($new_image))) {

            list($width_orig, $height_orig) = getimagesize($filepath);
            if ($width_orig != $w || $height_orig != $h) {
                $image = Image::make($filepath)
                    ->resize(
                        $w,
                        $h,
                        function (Constraint $constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        }
                    )
                    ->encode($extension, 95);
                    //->save(platformSlashes(public_path($new_image)));
                Storage::disk(config('voyager.storage.disk'))->put($new_image, (string)$image, 'public');

                return $new_image;
            } else {
                copy(platformSlashes(public_path($old_image)), platformSlashes(public_path($new_image)));
                return $new_image;
            }
        } else {

            return $new_image;
        }
    }

    public static function create_download_image_url_cache($filepath, $w, $h) {
        //dd($filepath);

        $old_image = $filepath;
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        $new_image = 'cache' .'/' . mb_substr(($old_image), 0, mb_strrpos(($old_image), '.')) . '-' . $w . 'x' . $h . '.' . $extension;


        // dd(get_file_path($new_image));
        if (!is_file(get_file_path($new_image))) {


            $url = 'http://sherif.ua/components/com_jshopping/files/img_products/' . $filepath;
            $orig_image = get_file_path($filepath);
            $img = $new_image;

            file_put_contents($orig_image, file_get_contents($url));
            //$filepath = get_file_path($filepath);
            if (!is_file($orig_image)) {
              return ('/storage/placeholder.png');
            }
            //dd($orig_image);
            list($width_orig, $height_orig) = getimagesize($orig_image);
            if ($width_orig != $w || $height_orig != $h) {
                $image = Image::make($orig_image)
                    ->resize(
                        $w,
                        $h,
                        function (Constraint $constraint) {
                            $constraint->aspectRatio();
                            //$constraint->upsize();
                        }
                    )

                    ->resizeCanvas($w, $h, 'center', false, '#ffffff')
                    ->encode($extension, 95);
                //->save(platformSlashes(public_path($new_image)));
                Storage::disk(config('voyager.storage.disk'))->put($new_image, (string)$image, 'public');

                return $new_image;
            } else {
                copy(platformSlashes(public_path($old_image)), platformSlashes(public_path($new_image)));
                return $new_image;
            }
        } else {

            return $new_image;

        }
    }

    public static function set_image_url_cache($file, $type = '') {
        if (is_file($file)) {
            $file->move(storage_path() . '/app/public'.'/'.$type,$file->getClientOriginalName());
            //$image = Image::make($file->getRealPath())->stream();
            //Storage::disk(config('voyager.storage.disk'))->put($type .'/' .  $file->getClientOriginalName(), $file, 'public');
                //->save(platformSlashes(public_path($new_image)));
            return ($type .'/' .  $file->getClientOriginalName());

        } else {
            return ('/storage/placeholder.png');
        }
    }

    public static function get_file_path($file) {

            return platformSlashes(Storage::disk(config('voyager.storage.disk'))->path($file));
    }
}