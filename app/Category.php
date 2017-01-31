<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Relations
     */

    /**
     * Get sub-sections (if exists)
     * @return hasMany
     */
    public function sections()
    {
        return $this->hasMany('App\Section', 'category_id');
    }
}
