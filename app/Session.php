<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Session extends Model
{
    protected $table = 'session';
    protected $fillable = ['ip', 'payload', 'session_id','user_id', 'id_product', 'amount_product'];
}
