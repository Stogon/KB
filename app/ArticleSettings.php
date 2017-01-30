<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleSettings extends Model
{
    protected $table = 'articles_settings';
    public $timestamps = false;

    protected $fillable = ['visibility', 'allow_comments'];

    /**
     * Relations
     */

    /**
     * Get the linked article
     * @return hasOne
     */
    public function article()
    {
        return $this->hasOne('App\Article', 'settings_id');
    }
}
