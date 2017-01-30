<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleFile extends Model
{
    protected $table = 'articles_files';
    public $timestamps = true;

    protected $fillable = [
        'filename', 'path', 'type', 'locked', 'article_id', 'author_id'
    ];

    /**
     * Relations
     */

    /**
     * Get the file's author
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
