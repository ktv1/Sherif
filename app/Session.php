<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Session extends Model
{
    public $timestamps = false;
    protected $fillable = ['ip_session','payload', 'session_id','user_id','id_product','amount_product'];
    protected $table = 'session';
}
