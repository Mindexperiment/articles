<?php

namespace Agpretto\Articles\Tests\Integration\Http\Controllers;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

class ArticlesControllerTest extends IntegrationTestCase
{
    public function test_StoreRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = [
            'title' => 'foo bar baz',
            'body' => 'foo',
        ];

        $response = $this->post(route('articles.admin.store'), $article);

        $this->assertDatabaseHas('articles', [ 'title' => $article['title'], 'slug' => 'foo-bar-baz' ]);
        $response->assertRedirect(route('articles.admin.index'));
    }

    public function test_UpdateRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create([ 'author_id' => $user->id ]);

        $data = [ 'title' => 'Foo bar baz' ];
        $response = $this->from(route('articles.admin.edit', $article))
            ->patch(route('articles.admin.update', $article), $data);

        $this->assertDatabaseHas('articles', [ 'title' => $data['title'], 'slug' => 'foo-bar-baz' ]);
        $response->assertRedirect(route('articles.admin.edit', $article));
    }

    public function test_DeleteRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create([ 'author_id' => $user->id ]);

        $response = $this->from(route('articles.admin.index'))->delete(route('articles.admin.destroy', $article));

        $this->assertDatabaseMissing('articles', [ 'id' => $article->id, 'title' => $article->title ]);
        $response->assertRedirect(route('articles.admin.index'));
    }
}
