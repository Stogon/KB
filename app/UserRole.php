<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_roles';
    public $timestamps = false;

    protected $fillable = ['name', 'ldap_group'];

    /**
     * Relations
     */

    /**
     * Users
     * @return belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_has_roles', 'role_id', 'user_id');
    }
}
