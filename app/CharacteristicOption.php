<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CharacteristicOption extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['*'];
    public $timestamps = false;

    public function characteristics()
    {
        return $this->belongsTo('App\Characteristic');
    }
}
