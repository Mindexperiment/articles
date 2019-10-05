<?php

namespace Agpretto\Articles\Tests\Unit;

use Agpretto\Articles\Tests\IntegrationTestCase;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

class ArticleTest extends IntegrationTestCase
{
    public function test_BelongsToAuthor()
    {
        $user = factory(User::class)->create();
        $article = factory(Article::class)->create([ 'author_id' => $user->id ]);

        $this->assertSame($user->id, $article->author->id);
    }

    public function test_AccessProperties()
    {
        $article = factory(Article::class)->create([
            'title' => 'foo',
            'body' => 'bar',
        ]);

        $this->assertSame('foo', $article->title);
        $this->assertSame('bar', $article->body);
        $this->assertSame(null, $article->published_at);
    }

    public function test_SlugWhenSaving()
    {
        $user = factory(User::class)->create();
        $article = Article::create([
            'author_id' => $user->id,
            'title' => 'foo that slug',
            'body' => 'bar',
        ]);

        $this->assertSame('foo-that-slug', $article->slug);

        $article->update([ 'title' => 'modify that slug' ]);

        $this->assertSame('modify-that-slug', $article->slug);
    }

    public function test_MarkdownBody()
    {
        $article = factory(Article::class)->create([
            'body' => '# title',
        ]);

        $this->assertSame('<h1>title</h1>', $article->parsedBody);
    }
}
