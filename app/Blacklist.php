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
        'phone',
        'ip',
        'email',
        'fullname',
        'city',
        'buyed_at',
        'order_num',
        'comment'
    ];

    /**
     * Soft delete variable
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function getDuplicate($data)
    {
        return Blacklist::withTrashed()
            ->where('id', '!=', $data['exclude'])
            ->where(function($query) use($data) {
                foreach(array_slice($data, 1) as $k => $v) {
                    $query->orWhere($k, $v);
                }
            })->get(['id', 'deleted_at'])->toArray()[0];
    }
}
