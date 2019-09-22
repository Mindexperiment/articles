<?php

namespace Agpretto\Articles\Tests\Unit\Http\Controllers;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Article;

class PublicControllerTest extends IntegrationTestCase
{
    public function test_IndexRoute()
    {
        $response = $this->get(route('articles.index'));

        $response->assertOk();
        $response->assertViewIs('articles::wrapper');
        $response->assertViewHas('page', 'articles::pages.index');
        $response->assertViewHas('articles');
    }

    public function test_ArticleRoute()
    {
        $article = factory(Article::class)->create();

        $response = $this->get(route('articles.article', $article));

        $response->assertOk();
        $response->assertViewIs('articles::wrapper');
        $response->assertViewHas('page', 'articles::pages.article');
        $response->assertViewHas('article');
        $response->assertSee($article->title);
    }
}
