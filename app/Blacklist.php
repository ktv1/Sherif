<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blacklist extends Model
{
    use SoftDeletes;
    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'blacklist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'value',
        'comment',
    ];

    /**
     * The attributes enumerate of type column.
     *
     * @var array
     */
    protected $types = [
        'ip',
        'phone',
        'email'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'author');
    }
}
