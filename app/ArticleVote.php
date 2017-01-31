<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleVote extends Model
{
    protected $table = 'articles_votes';
    public $timestamps = true;

    protected $fillable = [
        'vote', 'author_id', 'article_id'
    ];

    /**
     * Relations
     */

    /**
     * Get the vote's author
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
