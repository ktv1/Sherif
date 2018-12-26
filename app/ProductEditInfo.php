<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductEditInfo extends Model
{
    public $timestamps = false;
    protected $table = 'product_edit_info';
    protected $fillable = ['product_id', 'publication_user','publication_updated_at','editing_user','editing_updated_at',
        'publication_action','description_user','description_updated_at','status','status_updated_at','status_user','status_to_change'];
}
