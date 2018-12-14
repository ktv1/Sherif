<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    public static $_instance = null;
    public $timestamps = false;
    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }
    public function wholesale()
    {
        return $this->hasMany('App\ProductWholesale');
    }

    public function edit_info()
    {
        return $this->hasOne('App\ProductEditInfo');
    }

    public function SubcategoryAttributes($id) {
       return DB::table('category_attributes_pivot as cap')
           ->join('attribute_value_pivot as avp','avp.attribute_id','cap.attribute_id')
           ->join('attribute_values as av', 'av.id','avp.attribute_value_id')
               ->where(
           'subcategory_id', '=', $id
        )->get();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInStock($query)
    {
        return $query->where('in_stock', 1);
    }
    public function scopeSearch($query, $str)
    {
        $str = '%' . $str . '%';

        return $query->where('title', 'like', $str)
            ->orWhere('excerpt', 'like', $str)
            ->orWhere('content', 'like', $str);
    }
}
