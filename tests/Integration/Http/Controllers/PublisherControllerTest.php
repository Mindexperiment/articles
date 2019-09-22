<?php

namespace Agpretto\Articles\Tests\Integration\Http\Controllers;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

class PublisherControllerTest extends IntegrationTestCase
{
    public function test_PublishRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create();

        $response = $this->from(route('articles.admin.index'))
            ->post(route('articles.admin.publish', $article));

        $article = Article::find($article->id);
        $this->assertNotNull($article->published_at);
        $this->assertTrue($article->isPublished());
        $response->assertRedirect(route('articles.admin.index'));
    }

    public function test_UnublishRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create();
        $this->post(route('articles.admin.publish', $article));

        $response = $this->from(route('articles.admin.index'))
            ->delete(route('articles.admin.unpublish', $article));

        $article = Article::find($article->id);
        $this->assertNull($article->published_at);
        $this->assertFalse($article->isPublished());
        $response->assertRedirect(route('articles.admin.index'));
    }
}
