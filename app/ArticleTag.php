<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $table = 'articles_tags';
    public $timestamps = false;

    protected $fillable = ['tag'];

    /**
     * Relations
     */

    /**
     * Get all articles associated with this tag
     * @return belongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'articles_tags_has_article', 'articles_tags_id', 'articles_id');
    }
}
