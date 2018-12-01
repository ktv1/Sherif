<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributePivot extends Model {
    protected $table = 'product_attributes_pivot';
	protected $fillable = ['*'];

    protected $appends = ['value'];

}
