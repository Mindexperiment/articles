<?php

namespace Agpretto\Articles\Tests\Unit;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

class HasArticlesTest extends IntegrationTestCase
{
    public function test_UserMayHaveManyArticles()
    {
        $user = factory(User::class)->create();
        $articles = factory(Article::class, 7)->create([ 'author_id' => $user->id ]);
        $others = factory(Article::class, 3)->create();

        $this->assertCount(7, $user->articles()->get());
        $this->assertCount(7, $user->articles);
    }

    public function test_UserCanCreateOwnArticles()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->make([ 'slug' => '' ]);

        $result = $user->articles()->create($article->toArray());

        $this->assertDatabaseHas('articles', [ 'author_id' => $user->id, 'title' => $article->title ]);
    }
}
