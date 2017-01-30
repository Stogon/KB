<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'users_settings';
    public $timestamps = false;

    protected $fillable = ['key', 'value', 'user_id'];

    /**
     * Relations
     */

    /**
     * Get the user
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
