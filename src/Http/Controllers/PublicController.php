<?php

namespace Agpretto\Articles\Http\Controllers;

use Illuminate\Routing\Controller;
use Agpretto\Articles\Article;

class PublicController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('articles::wrapper', [ 'page' => 'articles::pages.index' ])
            ->with('articles', $articles);
    }

    public function article(Article $article)
    {
        return view('articles::wrapper', [ 'page' => 'articles::pages.article' ])
            ->with('article', $article);
    }
}
