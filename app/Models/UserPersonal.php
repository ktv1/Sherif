<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPersonal extends Model
{
    //
    protected $table = 'user_personal';
    protected $fillable = ['*'];
    public $timestamps = false;
    public static $_instance = null;

    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }
    public function user()
    {
        return $this->belongsTo(Users::class, 'id');
    }

}
