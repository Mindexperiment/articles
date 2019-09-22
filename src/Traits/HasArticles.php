<?php

namespace Agpretto\Articles\Traits;

use Agpretto\Articles\Article;

trait HasArticles
{
    /**
     * A model may have many articles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }
}
