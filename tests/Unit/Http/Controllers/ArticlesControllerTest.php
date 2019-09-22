<?php

namespace Agpretto\Articles\Tests\Unit\Http\Controllers;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

class ArticlesControllerTest extends IntegrationTestCase
{
    public function test_IndexRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('articles.admin.index'));

        $response->assertOk();
        $response->assertViewIs('articles::wrapper');
        $response->assertViewHas('page', 'articles::admin.index');
        $response->assertViewHas('articles');
    }

    public function test_CreateRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('articles.admin.create'));

        $response->assertOk();
        $response->assertViewIs('articles::wrapper');
        $response->assertViewHas('page', 'articles::admin.create');
    }

    public function test_EditRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create();

        $response = $this->get(route('articles.admin.edit', $article));

        $response->assertOk();
        $response->assertViewIs('articles::wrapper');
        $response->assertViewHas('page', 'articles::admin.edit');
        $response->assertViewHas('article');
    }

    public function test_ShowRoute()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create();

        $response = $this->get(route('articles.admin.show', $article));

        $response->assertOk();
        $response->assertViewIs('articles::wrapper');
        $response->assertViewHas('page', 'articles::admin.show');
        $response->assertViewHas('article');
    }
}
