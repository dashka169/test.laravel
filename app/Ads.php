<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ads
 *
 * @package App
 *
 * @property string $title
 * @property string $description
 * @property integer $user_id
 *
 */
class Ads extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
