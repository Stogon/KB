<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $table = 'articles_comments';
    public $timestamps = true;

    protected $fillable = [
        'content', 'author_id', 'article_id'
    ];

    /**
     * Relations
     */

    /**
     * Get the comment's author
     * @return belongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * Get the linked article
     * @return belongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }
}
