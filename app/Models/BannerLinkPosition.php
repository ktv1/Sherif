<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerLinkPosition extends Model
{
    protected $table = 'banner_link_position';
    protected $fillable = ['*'];
    public $timestamps = false;
    protected $primaryKey = 'banner_image_id';

    public function bannerImages() {
        return $this->belongsTo(BannerImages::class, 'id', 'banner_image_id');
    }
}
