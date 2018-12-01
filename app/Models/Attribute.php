<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attribute extends Model
{
    protected $table = 'attribute';
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

    public function getAttributesValue($key)
    {
        return DB::table('attribute_values as av')
            ->join('attribute_value_pivot as avp', 'avp.attribute_value_id','av.id')
            ->join('attribute as a', 'a.id','avp.attribute_id')
            ->where('avp.attribute_id','=',$key)
            ->get();
    }
}
