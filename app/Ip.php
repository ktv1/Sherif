<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Request;

class Ip extends Model
{
    //
    protected $table = 'ip';
    protected $primaryKey = 'id';
    protected $fillable = ['*'];

    public function scopeIsAdmin($query)
    {
        return $query->where([
            ['ip', '=', \Illuminate\Support\Facades\Request::getClientIp()],
            ['typeacess', '=', 1]
        ]);
    }
}
