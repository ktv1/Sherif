<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAttributes extends Model
{
    //
    protected $table = 'category_attributes_pivot';
    protected $fillable = ['*'];

    public function AttributeValues() {
        return $this->hasMany(AttributeValuePivot::class);
    }
}
