<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BannerImages extends Model
{
    protected $table = 'banner_image';
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
    public function banner()
    {
        return $this->belongsTo(Banner::class,'id', 'banner_id');
    }
    public function bannerLinkPosition() {
        return $this->hasMany(BannerLinkPosition::class, 'banner_image_id', 'id');
    }
    public function getBannerImageLink($banner_image_id)
    {
        $query = DB::table('banner_link_position')
            ->where('banner_image_id',$banner_image_id)
            ->get()
            ->toArray();
        $result = array();
        foreach ($query as $res) {
            $result[$res->banner_position_id] = $res->link;
        }
        return $result;
    }
}
