<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Characteristic extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['*'];
    public $timestamps = false;
}
