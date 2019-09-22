<?php

namespace Agpretto\Articles\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Publishable
{
    /**
     * Publish the model
     */
    public function publish()
    {
        $this->update([
            'published_at' => $this->freshTimestamp()
        ]);

        return $this;
    }

    /**
     * Unpublish the model
     */
    public function unpublish()
    {
        $this->update([
            'published_at' => null
        ]);

        return $this;
    }

    // - scopes

    /**
     * Get only published models
     */
    public function scopePublished(Builder $query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', $this->freshTimestamp());
    }

    /**
     * Get only unpublished models
     */
    public function scopeUnpublished(Builder $query)
    {
        return $query->whereNull('published_at')->orWhere('published_at', '>', $this->freshTimestamp());
    }

    // - checks

    /**
     * Check if model is published
     */
    public function isPublished()
    {
        if (is_null($this->published_at)) { return false; }

        return $this->published_at->lte($this->freshTimestamp());
    }
}
