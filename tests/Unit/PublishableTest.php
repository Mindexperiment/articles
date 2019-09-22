<?php

namespace Agpretto\Articles\Tests;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

class PublishableTest extends IntegrationTestCase
{
    public function test_ArticleCanBePublished()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create([ 'author_id' => $user->id ]);

        $article->publish();

        $this->assertTrue($article->isPublished());
        $this->assertNotNull($article->published_at);
    }

    public function test_PublishedArticleCanBeUnpublished()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create([ 'author_id' => $user->id ]);
        $article->publish();

        $this->assertTrue($article->isPublished());

        $article->unpublish();

        $this->assertFalse($article->isPublished());
        $this->assertNull($article->published_at);
    }

    public function test_ScopePublishedArticles()
    {
        $article = factory(Article::class, 5)->create();
        $published = factory(Article::class, 7)->create()->each(function ($article) {
            $article->publish();
        });

        $articles = Article::published()->get();

        $this->assertCount(7, $articles);

        $articles = Article::unpublished()->get();

        $this->assertCount(5, $articles);
    }
}
