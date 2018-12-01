<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id';
    protected $fillable = ['*'];
    public $timestamps = false;
    public static $_instance = null;

    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }
    public function bannerImages() {
        return $this->hasMany(BannerImages::class, 'banner_id');
    }


    public function bannerLinkPosition() {
        return $this->hasManyThrough(BannerLinkPosition::class, BannerImages::class,   'banner_id', 'banner_image_id','id');
    }
    public function getBannerImages($banner_id) {
        $banner_image_data = array();

        $banner_image_query = DB::table('banner_image')
            ->where('banner_id', $banner_id)
            ->orderBy('order', 'ASC')
            ->get()
            ->toArray();//("SELECT * FROM " . DB_PREFIX . "banner_image WHERE banner_id = '" . (int)$banner_id . "' ORDER BY sort_order ASC");
        foreach ($banner_image_query as $banner_image) {


            $banner_link_position_data = array();
            $banner_link_position_query = DB::table('banner_link_position')
                ->where([
                    'banner_image_id' => $banner_image->id,
                    'banner_id' => $banner_id
                ])
                ->get()
                ->toArray();
            foreach ($banner_link_position_query as $banner_link_position) {
                $banner_link_position_data[$banner_link_position->banner_position_id] = array('link' => $banner_link_position->link);
            }
            $banner_image_data[] = array(
                'banner_image_description' => $banner_image->description,
                'banner_link_position'     => $banner_link_position_data,
                'link'                     => $banner_image->link,
                'type'                     => $banner_image->type,
                'image'                    => $banner_image->image,
                'order'                    => $banner_image->order
            );
        }

        return $banner_image_data;
    }

    public function getBanner($banner_id) {
        $query = DB::table('banner')
            ->distinct()
            ->where('id', $banner_id)
            ->get()
            ->toArray();
        $result = array();
        foreach ($query as $res) {
            $result[] = (array)$res;
        }
        return $result;
    }
}
