<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCharacteristicPivot extends Model
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

    public function characteristics()
    {
        return $this->belongsToOne('App\Characteristic');
    }


}
