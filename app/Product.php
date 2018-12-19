<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    public static $_instance = null;
    protected $table = 'products';
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
    public function characteristics()
    {
        return $this->belongsToMany('App\Characteristic', 'products_characteristics_pivot')->withPivot('option_id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category','product_categories_pivot');
    }
    public function characteristicsopt()
    {
        return $this->hasMany('App\ProductCharacteristicPivot');//->with('options');
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

    public function getProductCharacteristics($product_id) {
        /////////////////////////////
        // product characteristics
        ///////////////////////

        $productCharacteristics = ProductCharacteristicPivot::where('product_id',$product_id)
            //->leftJoin('characteristic_options as co','co.id','products_characteristics_pivot.option_id')
            ->join('characteristics as c','c.id','products_characteristics_pivot.characteristic_id')
            ->selectRAW('*, count(`option_id`) as countopt')
            ->groupBy('characteristic_id')
            ->get();

        $pc = array();
        foreach ($productCharacteristics as $value){
            if($value->countopt > 1) {
                for ($i = 0; $i <= $value->countopt - 1; $i++) {
                    $pc[$value->characteristic_id][] = $value;
                }
            } else {
                $pc[$value->characteristic_id] = $value;
            }
        }

        $str = array();
        foreach ($pc as $key => $item) {
            if (count($item) === 1) {
                $str[$key]['char_name'] = $item->name;
                $st = '';
                if ($item->type === 1) {

                    $st .= $item->option_id;
                } else {
                    $optval = CharacteristicOption::where('id',(int)$item->option_id)->first();
                    $st .= isset($optval->value) ? $optval->value : '';
                }
                $str[$key]['char_value'] = $st;
                $str[$key]['gr_id'] = $item->group_id;
            } elseif (count($item) > 1) {

                $st = '';
                $productCharacteristicsManyOPt = ProductCharacteristicPivot
                    ::join('characteristic_options as co','co.id','products_characteristics_pivot.option_id')
                    ->join('characteristics as c','c.id','products_characteristics_pivot.characteristic_id')
                    ->where([
                        'product_id' => $product_id,
                        'characteristic_id' => $key
                    ])->get();
                $numItems  = count($productCharacteristicsManyOPt);
                $i = 1;
                foreach ($productCharacteristicsManyOPt as $k => $value){

                    $str[$key]['gr_id'] = $value->group_id;
                    $str[$key]['char_name'] = $value->name;
                    if ($value->type == 1) {
                        $st .= $value->option_id;
                    } else {
                        if($i++ === $numItems) {
                            $st .= $value->value ;
                        } else {
                            $st .= $value->value . ', ';
                        }
                    }
                        $str[$key]['char_value'] = $st;
                }
            }
        }

        return $str;
    }


    public function GetCategoriesPath($parent_id){
        $output = array();
        $results = $this->getParentCategory($parent_id);
        foreach ($results as $result) {
            $output[$result->id] = $result->slug;
            if($result->parent_id != 0) {
                $output += $this->GetCategoriesPath($result->parent_id);
            }
        }
        return $output;
    }
    private function getParentCategory($parent_id)
    {
        return Category::where('id', $parent_id)->get();
    }

}
