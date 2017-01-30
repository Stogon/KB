<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'description', 'section_parent_id'];

    /**
     * Relations
     */

    /**
     * Get the parent section (if exists)
     * @return belongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Section', 'section_parent_id');
    }

    /**
     * Get sub-sections (if exists)
     * @return hasMany
     */
    public function subsections()
    {
        return $this->hasMany('App\Section', 'section_parent_id');
    }

    /**
     * Get all articles linked to this section
     * @return hasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article', 'section_id');
    }
}
