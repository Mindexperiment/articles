<?php

namespace Agpretto\Articles\Http\Controllers;

use Illuminate\Routing\Controller;
use Agpretto\Articles\Article;

class PublisherController extends Controller
{
    public function publish(Article $article)
    {
        $article->publish();

        return back();
    }

    public function unpublish(Article $article)
    {
        $article->unpublish();

        return back();
    }
}
