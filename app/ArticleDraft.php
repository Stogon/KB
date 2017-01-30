<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDraft extends Model
{
    protected $table = 'articles_drafts';
    public $timestamps = true;

    protected $fillable = ['payload', 'user_id'];

    /**
     * Relations
     */

    /**
     * Get the draft's author
     * @return belongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
