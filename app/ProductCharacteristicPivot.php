<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCharacteristicPivot extends Pivot
{
    //
    protected $table = 'products_characteristics_pivot';
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

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function characteristics()
    {
        return $this->belongsTo('App\Characteristic','characteristic_id');
    }

    public function options()
    {
        return $this->hasManyThrough('App\ProductCharacteristicPivot','App\CharacteristicOption','id_characteristic','option_id');
        //return $this->hasManyThrough('App\Characteristic','App\CharacteristicOption','id_characteristic','id','option_id');
    }


}
