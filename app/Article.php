<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = true;

    protected $fillable = [
        'title', 'slug', 'content', 'type', 'section_id', 'settings_id', 'author_id'
    ];

    /**
     * Relations
     */

    /**
     * Get the linked section
     * @return belongsTo
     */
    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    /**
     * Get the article settings
     * @return belongsTo
     */
    public function settings()
    {
        return $this->belongsTo('App\ArticleSettings', 'settings_id');
    }

    /**
     * Get the article's author
     * @return belongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * Get the article's comments
     * @return hasMany
     */
    public function comments()
    {
        return $this->hasMany('App\ArticleComment', 'article_id');
    }

    /**
     * Get all the tags linked to this article
     * @return belongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\ArticleTag', 'articles_tags_has_articles', 'articles_id', 'articles_tags_id');
    }

    /**
     * Get all the files linked to this article
     * @return hasMany
     */
    public function files()
    {
        return $this->hasMany('App\ArticleFile', 'article_id');
    }
}
