<?php

namespace Agpretto\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Agpretto\Articles\Traits\Publishable;
use Agpretto\Articles\Traits\MarkdownParser;

class Article extends Model
{
    use Publishable, MarkdownParser;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'slug', 'title', 'body', 'published_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * The field to use on route
     */
    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Register methods when booting model
     */
    public static function boot() {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->title, '-');
        });
    }

    /**
     * Get the markdown parsed body
     * 
     * @return string
     */
    public function getParsedBodyAttribute()
    {
        return $this->parse($this->body);
    }

    /**
     * An article belongs to an author
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(config('articles.author'), 'author_id');
    }
}
