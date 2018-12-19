<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Characteristic extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['*'];
    public $timestamps = false;

    //public function Products()
    //{
    //    return $this->belongsToMany('App\Product')->withPivot('products_characteristics_pivot');
    //}
    public function Options()
    {
        return $this->hasMany('App\CharacteristicOption','id_characteristic');
    }
}
