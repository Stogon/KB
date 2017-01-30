<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserState extends Model
{
    protected $table = 'users_states';
    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * Relations
     */

    /**
     * Get users by state
     * @return hasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'state_id');
    }
}
