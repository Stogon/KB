<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password', 'state_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relations
     */

    /**
     * User state
     * @return belongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\UserState', 'state_id');
    }

    /**
     * User roles
     * @return belongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\UserRole', 'users_has_roles', 'user_id', 'role_id');
    }

    /**
     * User settings
     * @return hasMany
     */
    public function settings()
    {
        return $this->hasMany('App\UserSetting', 'user_id');
    }

    /**
     * Get the user's drafts
     * @return hasMany
     */
    public function articles_drafts()
    {
        return $this->hasMany('App\ArticleDraft', 'author_id');
    }

    /**
     * Get the user's comments
     * @return hasMany
     */
    public function articles_comments()
    {
        return $this->hasMany('App\ArticleComment', 'author_id');
    }
}
