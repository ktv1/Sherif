<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public static $_instance = null;

    //Add extra attribute
    protected $attributes = ['characteristics'];

    //Make it available in the json response
    protected $appends = ['characteristics'];


    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }

    public function BuildThree($categories,$parent_id = 0,$cp = 0){
        $output = new \stdClass();

        foreach ($categories as $result) {
            if($parent_id == $result->parent_id) {
                $pc = $this->BuildThree($categories,$result->id);

                $id = $result->id;
                if (!isset($output->$id)) {
                    $output->$id = new \stdClass();
                }
                if(!empty($pc)) {
                    $output->$id->id = $id;
                    $output->$id->parent_id = $result->parent_id;
                    $output->$id->child = $pc;
                    $output->$id->slug = $result->slug;
                    $output->$id->path = $result->path;
                    $output->$id->name = $result->name;
                    $output->$id->product_count = $result->product_count;
                } else {
                    $output->$id->id = $id;
                    $output->$id->parent_id = $result->parent_id;
                    $output->$id->slug = $result->slug;
                    $output->$id->path = $result->path;
                    $output->$id->name = $result->name;
                    $output->$id->shild = null;
                    $output->$id->product_count = $result->product_count;
                }
            }
        }
        return $output;
    }


    private function getChildCategory($id)
    {
        return Category::where('parent_id', $id)->get();
    }

    public function getCharacteristicsAttribute()
    {
        $characteristics = Characteristic::all();
        $categoryCharacteristics = array();
        foreach ($characteristics as $characteristic) {
            $catChar = explode(',',$characteristic->categories);
            foreach ($catChar as $item) {
                if(((integer)$this->id == (integer)$item) && ($characteristic->type == 0)) {
                    $cv = CharacteristicOption::where([
                                'id_characteristic' => $characteristic->id
                            ])
                        ->orderBy('ordering', 'DESC')
                        ->get(['id','value'])
                        ->toArray();
                    foreach ($cv as $cvi) {
                        $categoryCharacteristics[$characteristic->id]['values'][$cvi['id']]['name'] = $cvi['value'];
                        $categoryCharacteristics[$characteristic->id]['values'][$cvi['id']]['count'] = ProductCharacteristicPivot
                        ::join('product_categories_pivot as pcp', 'pcp.product_id','products_characteristics_pivot.product_id')
                        ->where('products_characteristics_pivot.option_id',$cvi['id'])
                        ->where('pcp.category_id',$item)
                        ->count();
                    }
                    $categoryCharacteristics[$characteristic->id]['name'] = $characteristic->name;
                    $categoryCharacteristics[$characteristic->id]['slug'] = $characteristic->slug;

                }
            }
        }
        return $this->attributes['characteristics'] = $categoryCharacteristics;
    }
}
